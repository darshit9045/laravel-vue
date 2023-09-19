<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        /*$blogs = Blog::select('blogs.id','blogs.title','blogs.feature_image', 'blogs.categories', 'blogs.status', DB::raw('GROUP_CONCAT(categories.name SEPARATOR ", ") as category_names'))
            ->leftJoin('categories', function ($join) {
                $join->whereRaw('FIND_IN_SET(categories.id, blogs.categories)');
            })
            ->groupBy('blogs.id')
            ->paginate(20);*/
        $blogs = Blog::orderBy('id', 'desc')->paginate(20);

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $tags = Tag::select('id', 'name')->get();
        return view('admin.blog.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Page::where('slug', 'blog')->count() === 0) {
            Page::create(['name' =>'Blog', 'slug' => 'blog', 'body' => '<h1>Default Page!</h1>', 'status' => 'Public']);
        }
        $validated = $request->validate([
            'title' => 'required',
            'slug' => [
                'unique:blogs,slug'
            ],
            'description' => 'required',
            'feature_image' => 'required|file|image|max:2048'
        ]);
        $input = $request->all();
        if (isset($request->categories)) {
            $input['categories'] = implode(', ', $request->categories);
        }
        if (isset($request->tags)) {
            $input['tags'] = implode(', ', $request->tags);
        }
        if (empty($request->slug)) {
            $slug = Str::slug($request->title);
            $validator = Validator::make(['slug' => $slug], [
                'slug' => [
                    'unique:blogs,slug'
                ]
            ]);
            if ($validator->fails()) {
                $slug = $request->slug = Str::slug($request->title) . '-' . time();
            }
            $input['slug'] = $slug;
        }
        if ($image = $request->file('feature_image')) {
            $destinationPath = public_path('images/');
            $profileImage = $input['slug'].'-'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['feature_image'] = "$profileImage";
        }
        $input['created_by'] = Auth::id();
        Blog::create($input);

        return redirect()->route('blog.index')->with('success','Blog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $blog = Blog::find($id);
       return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::select('id', 'name')->get();
        $tags = Tag::select('id', 'name')->get();
        $blog = Blog::find($id);

        return view('admin.blog.edit', compact(['categories', 'tags', 'blog']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => [
                Rule::unique('blogs')->ignore($id)
            ],
            'description' => 'required',
            'feature_image' => 'file|image|max:2048'
        ]);
        $input = $request->all();
        if (isset($request->categories)) {
            $input['categories'] = implode(', ', $request->categories);
        }
        if (isset($request->tags)) {
            $input['tags'] = implode(', ', $request->tags);
        }
        if (empty($request->slug)) {
            $slug = Str::slug($request->title);
            $validator = Validator::make(['slug' => $slug], [
                'slug' => [
                    Rule::unique('blogs')->ignore($id)
                ]
            ]);
            if ($validator->fails()) {
                $slug = $request->slug = Str::slug($request->title) . '-' . time();
            }
            $input['slug'] = $slug;
        }
        if ($image = $request->file('feature_image')) {
            $destinationPath = public_path('images/');
            $profileImage = $input['slug'].'-'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['feature_image'] = "$profileImage";
        }
        $blog = Blog::find($id);
        $blog->update($input);

        return redirect()->route('blog.index')->with('success','Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        $blog->update(['status'=>'3']);
        return back()->with('success', 'Blog Moved to the Trash.');
    }

    /**
     * Force delete from database
     */
    public function trashedDelete($id) {
        Blog::where('id', $id)->delete();
        return back()->with('success', 'Blog deleted successfully.');
    }

    /**
     * Get trashed blog
     */
    public function trashed()
    {
        $blogs = Blog::where('status', '3')->orderBy('id', 'desc')->paginate(20);
        return view('admin.blog.trashed', compact('blogs'));
    }

    /**
     * Get Published blog
     */
    public function public()
    {
        $blogs = Blog::where('blogs.status', '1')->orderBy('id', 'desc')->paginate(20);
        return view('admin.blog.public', compact('blogs'));
    }

    /**
     * Get draft blog
     */
    public function draf(Request $request)
    {
        $blogs = Blog::where('blogs.status', '2')->orderBy('id', 'desc')->paginate(20);
        return view('admin.blog.draft', compact('blogs'));
    }

    /**
     * Update multi blog status
     */
    public function updateStatus(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required',
            'selecte_blog' => 'required',
        ]);
        $blogs = Blog::whereIn('id', explode(',', $request->selecte_blog))->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Blog status updated successfully.');
    }

    /**
     * Blog search
     */
    public  function search(Request $request)
    {
        $blogs = Blog::where('blogs.title', 'like', '%'.$request->search.'%')->orWhere('blogs.slug', 'like', '%'.$request->search.'%')->orderBy('id', 'desc')->paginate(20);

        $search = $request->search;
        return view('admin.blog.index', compact('blogs', 'search'));
    }

}

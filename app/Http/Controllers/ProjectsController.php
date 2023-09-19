<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Projects;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $projects = Projects::paginate(20);
        $projects = DB::table('projects')
            ->join('category', 'category.id', '=', 'projects.category_id')
            ->select('projects.*', 'category.name as category_name')
            ->paginate(20);
//        dd($projects);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::select('id', 'name')->get();
        $page = Page::select('id', 'name')->get();
        return view('admin.projects.create', compact(['category','page']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'page_id' => 'required',
            'type' => 'required',
            'status' => 'required',
            'project_status' => 'required',
            'image' => 'required|file|image|max:2048'
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = public_path('images/projects/');
            $projectImage = date('YmdHis') . "_" .$image->getClientOriginalName();
            $image->move($destinationPath, $projectImage);
            $input['image'] = "$projectImage";
        }
        Projects::create($input);

        return redirect()->route('projects.index')->with('success', 'Projects added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::select('id', 'name')->get();
        $page = Page::select('id', 'name')->get();
        $projects = Projects::find($id);
        return view('admin.projects.edit', compact('projects','category','page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', Rule::unique('projects')->ignore($id)],
            'description' => 'required',
            'category_id' => 'required',
            'page_id' => 'required',
            'type' => 'required',
            'status' => 'required',
            'project_status' => 'required',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = public_path('images/projects/');
            $projectImage = date('YmdHis') . "_" .$image->getClientOriginalName();
            $image->move($destinationPath, $projectImage);
            $input['image'] = "$projectImage";
        }
        if(empty($id)){
            $id = $input['id'];
        }
        $page = Projects::find($id);
        $page->update($input);

        return redirect()->route('projects.index')->with('success', 'Projects updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Projects::where('id', $id)->delete();
        return redirect()->route('projects.index')->with('success', 'Projects deleted successfully!');
    }
}

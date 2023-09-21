<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Category;
use App\Models\Settings;
use App\Models\Projects;
use App\Http\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pages = Page::paginate(20);
        return view('admin.index', compact('pages'));
        // ->with('i', (request()->input('page', 1) - 1) * 20)
    }

    public function getHeaderData(){
        $settingData = Settings::all();
        $projectCategoryData = Category::all();
        $headerContent = json_decode(get_setting('header_content'));
        $newArray = [];
        $newArray[] = $settingData;
        $newArray[] = $headerContent;
        $newArray[] = $projectCategoryData;
        return response()->json($newArray);
    }

    public function getHompageData(){
        $data = Page::where('slug', 'home-real-e-state')->paginate(20);
        //get slugs from dynamic data array Start
        $pattern = '/@([A-Za-z0-9_-]+)\([^)]*\)/';
        preg_match_all($pattern, $data[0]->body, $matches);
        $slugs = $matches[0];
        //get slugs from dynamic data array End
        foreach($slugs as $key => $value){
            //get slugs data dynamically from ShortcodeServiceProviders Start
            $content = \Illuminate\Support\Facades\Blade::compileString($value);
            if($key == 0){
                $newContent = str_replace($value,$content,$data[0]->body);
            }else{
                $newContent = str_replace($value,$content,$newContent);
            }
            //get slugs data dynamically from ShortcodeServiceProviders End
        }

        //remove blank p tag which contains spaces from dynamic string
        $newContent = str_replace(['<p></p>'], '', $newContent);
        return response()->json($newContent);
    }
    public function getAboutUsData(){
        $data = Page::where('slug', 'about-us')->paginate(20);
        return response()->json($data);
    }

    public function getContactUsData(){
        $data = Page::where('slug', 'contact')->paginate(20);
        return response()->json($data);
    }

    public function getResidentialProjectsData(){
        $data['ongoing'] =  Projects::select('projects.*','pages.name as page_name','pages.body as page_body','pages.slug as page_slug')
            ->join('pages', function($join) {
                $join->on('pages.id', '=', 'projects.page_id');
            })
            ->where(['project_status' => 'ongoing','category_id' => '2'])
            ->get();
        $data['completed'] = Projects::select('projects.*','pages.name as page_name','pages.body as page_body','pages.slug as page_slug')
            ->join('pages', function($join) {
                $join->on('pages.id', '=', 'projects.page_id');
            })
            ->where(['project_status' => 'completed','category_id' => '2'])
            ->get();
//        $data['ongoing'] = Projects::where(['project_status' => 'ongoing','category_id' => '2'])->get();
//        $data['completed'] = Projects::where(['project_status' => 'completed','category_id' => '2'])->get();
        return response()->json($data);
    }

    public function getCommercialProjectsData(){
        $data['ongoing'] = Projects::where(['project_status' => 'ongoing','category_id' => '3'])->get();
        $data['completed'] = Projects::where(['project_status' => 'completed','category_id' => '3'])->get();
        return response()->json($data);
    }

    public function getMalabarExoticaData(){
        $data = Projects::where(['project_status' => 'ongoing','id' => '2','name' => 'Malabar Exotica'])->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => [
                'unique:pages,slug'
            ],
            'body' => 'required',
            'feature_image' => 'file|image|max:2048'
        ]);

        $input = $request->all();
        if (empty($request->slug)) {
            $slug = Str::slug($request->name);
            $validator = Validator::make(['slug' => $slug], [
                'slug' => [
                    'unique:pages,slug'
                ]
            ]);
            if ($validator->fails()) {
                $slug = $request->slug = Str::slug($request->name) . '-' . time();
            }
            $input['slug'] = $slug;
        }

        if ($image = $request->file('feature_image')) {
            $destinationPath = public_path('images/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['feature_image'] = "$profileImage";
        }
        Page::create($input);
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return view('admin.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        if ($image = $request->file('feature_image')) {
            $destinationPath = public_path('images/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['feature_image'] = "$profileImage";
        } else {
            unset($input['feature_image']);
        }

        $page = Page::find($id);
        $page->update($input);

        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->update(['status'=>'Trash']);
        return back()->with('success', 'Product deleted successfully');
    }

    public function trashed()
    {
        $pages = Page::where('status', 'Trash')->paginate(20);
        return view('admin.trashed', compact('pages'));
    }

    public function trashedDelete($id)
    {
        Page::where('id', $id)->delete();
        return back()->with('success', 'Pages deleted successfully.');
    }

    public function public()
    {
        $pages = Page::where('status', 'public')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('admin.public', compact('pages'));
    }

    public function draf(Request $request)
    {
        $pages = Page::where('status', 'Draft')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('admin.draf', compact('pages'));
    }

    public function updateStatus(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required',
            'selecte_page' => 'required',
        ]);
        $pages = Page::whereIn('id', explode(',', $request->selecte_page))->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Pages status updated successfully.');
    }

    public  function search(Request $request) {

        $pages = Page::where('name', 'like', '%'.$request->search.'%')->orWhere('slug', 'like', '%'.$request->search.'%')->paginate(20);
        $search = $request->search;
        return view('admin.index', compact('pages', 'search'));
    }

}

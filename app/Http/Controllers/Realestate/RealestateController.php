<?php

namespace App\Http\Controllers\Realestate;

use App\Http\Controllers\Controller;
use App\Models\Realestate;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealestateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Realestate::paginate(20);
        return view('admin.realestate.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.realestate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'project_type' => 'required',
            'type' => 'required',
            'status' => 'required',
            'location' => 'required',
            'description' => 'required',
            'feature_image' => 'required|file|image|max:2048',
            'banner_image' => 'file|image|max:2048',
            'gallery.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        $sql = new Realestate;
        $sql->title = $request->title;
        $sql->project_type = $request->project_type;
        $sql->type = $request->type;
        $sql->status = $request->status;
        $sql->location = $request->location;
        $sql->description = $request->description;
        if (isset($request->amenities)) {
            $sql->amenities = implode(', ', $request->amenities);
        }
        if (isset($request->layout_title)) {
            $lyt = [];
            $layout_images = $request->file('layout_image');
            foreach ($layout_images AS $k => $li) {
                $customFileName = 'RealEstate_Layout_' . time() . '_' . $k . '.' . $li->getClientOriginalExtension();
                $path = $li->storeAs('uploads', $customFileName, 'public');
                $arr = ['image'=>$customFileName, 'Title'=>$request->layout_title[$k], 'Type'=>$request->layout_type[$k]];
                $lyt[] = $arr;
            }
            $sql->layout = json_encode($lyt);
        }
        $sql->specification = $request->specificaion;
        if (isset($request->surroundin_title)) {
            $srnd = [];
            $srnd['title'] = $request->surroundin_title;
            $srnd['description'] = $request->surroundin_description;
            if (isset($request->location_name)) {
                foreach ($request->location_name AS $k=>$ln) {
                    $srnd['location'][] = ['name'=>$ln, 'duration'=>$request->location_duration[$k]];
                }
            }
            $sql->surrounding = json_encode($srnd);
        }
        $sql->video_iframe = $request->video_iframe;
        $sql->map_iframe = $request->map_iframe;
        if ($request->hasFile('feature_image')) {
            $customFileName = 'RealEstate_Feature_Image_' . time() . '.' . $request->file('feature_image')->getClientOriginalExtension();
            $path = $request->file('feature_image')->storeAs('uploads', $customFileName, 'public');
            $sql->feature_image = $customFileName;
        }
        if ($request->hasFile('banner_images')) {
            $customFileName = 'RealEstate_banner_image_' . time() . '.' . $request->file('banner_images')->getClientOriginalExtension();
            $path = $request->file('banner_images')->storeAs('uploads', $customFileName, 'public');
            $sql->banner_images = $customFileName;
        }

        if ($request->file('gallery')) {
            $galleries = $request->file('gallery');
            $img = [];
            foreach ($galleries AS $k=>$glr) {
                $customFileName = 'RealEstate_gallery_' . time() . '_' . $k . '.' . $glr->getClientOriginalExtension();
                $path = $glr->storeAs('uploads', $customFileName, 'public');
                $img[] = $customFileName;
            }
            $sql->gallery = implode(', ', $img);
        }
        $sql->save();

        return redirect()->back()->with('success', 'Project Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Realestate $realestate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Realestate $realestate, $id)
    {
        $realestate = $realestate->find($id);
        return view('admin.realestate.edit', compact('realestate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Realestate $realestate, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'project_type' => 'required',
            'type' => 'required',
            'status' => 'required',
            'location' => 'required',
            'description' => 'required',
            'feature_image' => 'file|image|max:2048',
            'banner_image' => 'file|image|max:2048',
            'gallery.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        $sql = Realestate::find($id);
        $sql->title = $request->title;
        $sql->project_type = $request->project_type;
        $sql->type = $request->type;
        $sql->status = $request->status;
        $sql->location = $request->location;
        $sql->description = $request->description;
        if (isset($request->amenities)) {
            $sql->amenities = implode(', ', $request->amenities);
        }
        if (isset($request->layout_title)) {
            $lyt = [];
            $layout_images = $request->file('layout_image');
            if(!empty($realestate::find($id)->layout)) {
                $old_val = json_decode($realestate::find($id)->layout);
            }
            foreach ($request->layout_title AS $k => $val) {
                if (isset($layout_images[$k])) {
                    $li = $layout_images[$k];
                    $customFileName = 'RealEstate_Layout_' . time() . '_' . $k . '.' . $li->getClientOriginalExtension();
                    $path = $li->storeAs('uploads', $customFileName, 'public');
                } else {
                    $customFileName = $old_val[$k]->image;
                }
                $arr = ['image'=>$customFileName, 'Title'=>$val, 'Type'=>$request->layout_type[$k]];
                $lyt[] = $arr;
            }
            $sql->layout = json_encode($lyt);
        }
        $sql->specification = $request->specificaion;
        if (isset($request->surroundin_title)) {
            $srnd = [];
            $srnd['title'] = $request->surroundin_title;
            $srnd['description'] = $request->surroundin_description;
            if (isset($request->location_name)) {
                foreach ($request->location_name AS $k=>$ln) {
                    $srnd['location'][] = ['name'=>$ln, 'duration'=>$request->location_duration[$k]];
                }
            }
            $sql->surrounding = json_encode($srnd);
        }
        $sql->video_iframe = $request->video_iframe;
        $sql->map_iframe = $request->map_iframe;
        if ($request->hasFile('feature_image')) {
            $customFileName = 'RealEstate_Feature_Image_' . time() . '.' . $request->file('feature_image')->getClientOriginalExtension();
            $path = $request->file('feature_image')->storeAs('uploads', $customFileName, 'public');
            $sql->feature_image = $customFileName;
        }
        if ($request->hasFile('banner_images')) {
            $customFileName = 'RealEstate_banner_image_' . time() . '.' . $request->file('banner_images')->getClientOriginalExtension();
            $path = $request->file('banner_images')->storeAs('uploads', $customFileName, 'public');
            $sql->banner_images = $customFileName;
        }

        if ($request->file('gallery')) {
            $galleries = $request->file('gallery');
            $img = [];
            foreach ($galleries AS $k=>$glr) {
                $customFileName = 'RealEstate_gallery_' . time() . '_' . $k . '.' . $glr->getClientOriginalExtension();
                $path = $glr->storeAs('uploads', $customFileName, 'public');
                $img[] = $customFileName;
            }
            $sql->gallery = implode(', ', $img);
        }
        $sql->save();

        return redirect()->back()->with('success', 'Project Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Realestate $realestate, $id)
    {
        $realestate::find($id)->delete();

        return redirect()->back()->with('success', 'Project Deleted Successfully!');
    }
}

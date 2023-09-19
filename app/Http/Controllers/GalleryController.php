<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Gallery::select('galleries.id','galleries.image','galleries.title','galleries.alt','gallery_categories.name')->leftJoin('gallery_categories', 'galleries.category_id', '=', 'gallery_categories.id')->orderBy('id', 'desc')->paginate(32);

        return view('admin.gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image',
        ]);
        $input = $request->all();
        $destinationPath = public_path('images/gallery/');
        $images = $request->file('image');
        $nm = basename(pathinfo($images->getClientOriginalName(), PATHINFO_FILENAME));
        $profileImage = $nm.'-'.date('YmdHis') . "." . $images->getClientOriginalExtension();
        $images->move($destinationPath, $profileImage);
        $input['image'] = "$profileImage";
        if (empty($request->title)) {
            $input['title'] = $nm;
        }
        if (empty($request->alt)) {
            $input['alt'] = $nm;
        }
        Gallery::create($input);
        return redirect()->back()->with('success', 'Images uploaded successfully.');
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
        $categories = GalleryCategory::all();
        $image = Gallery::find($id);
        return view('admin.gallery.edit', compact(['categories', 'image']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'image' => 'image',
        ]);
        $input = $request->all();
        if ($request->file('image')) {
            $destinationPath = public_path('images/gallery/');
            $images = $request->file('image');
            $nm = basename(pathinfo($images->getClientOriginalName(), PATHINFO_FILENAME));
            $profileImage = $nm.'-'.date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $img = Gallery::find($id);
        $img->update($input);

        return redirect()->route('gallery.index')->with('success', 'Image updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Gallery::find($id);
        $image_path = public_path('images/gallery/'.$slider->image);
        if(file_exists($image_path)) {
            unlink($image_path);
        }
        $slider->delete();
        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully.');
    }

    /**
     * Remove the specified resource from upload.
     */
    public function upload(Request $request)
    {
        $validated = $request->validate([
            'image.*' => 'required|image',
        ]);
        $input = $request->input();
        $destinationPath = public_path('images/gallery/');

        if ($images = $request->file('image')) {
            foreach ($images AS $key => $img) {
                $nm = basename(pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME));
                $profileImage = $nm.'-'.date('YmdHis').".".$img->getClientOriginalExtension();
                $img->move($destinationPath, $profileImage);
                Gallery::create(['image'=>$profileImage, 'alt'=>$nm, 'title'=>$nm]);
            }
            return redirect()->route('gallery.index')->with('success', 'Images uploaded successfully.');
        }
        return redirect()->route('gallery.index')->with('error', 'Whoops! There were some problems with your input.');
    }

    /**
     * Display a search listing of the resource.
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $images = Gallery::select('galleries.id','galleries.image','galleries.title','gallery_categories.name')->leftJoin('gallery_categories', 'galleries.category_id', '=', 'gallery_categories.id')->where('galleries.title', 'like', '%'.$search.'%')->orWhere('galleries.alt', 'like', '%'.$search.'%')->orWhere('gallery_categories.name', 'like', '%'.$search.'%')->orWhere('gallery_categories.slug', 'like', '%'.$search.'%')->orderBy('id', 'desc')->paginate(20);

        return view('admin.gallery.index', compact(['images', 'search']));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:gallery_categories,name'
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);
        GalleryCategory::create($input);

        return back()->with('success', 'Category added successfully!');
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
        $category = GalleryCategory::find($id);
        return view('admin.gallery.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', Rule::unique('categories')->ignore($id)]
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);

        $page = GalleryCategory::find($id);
        $page->update($input);

        return redirect()->route('GalleryCategory.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        GalleryCategory::where('id', $id)->delete();
        return redirect()->route('GalleryCategory.index')->with('success', 'Category deleted successfully!');
    }
}

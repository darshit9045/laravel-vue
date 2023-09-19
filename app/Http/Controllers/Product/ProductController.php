<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Products::orderBy('id', 'desc')->paginate(20);

        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'product_image' => 'required|file|image|max:2048'
        ]);
        $input = $request->all();
        $slug = Str::slug($request->title);
        $validator = Validator::make(['slug' => $slug], [
            'slug' => [
                'unique:products,slug'
            ]
        ]);
        if ($validator->fails()) {
            $slug = $request->slug = Str::slug($request->title) . '-' . time();
        }
        $input['slug'] = $slug;
        if ($image = $request->file('product_image')) {
            $destinationPath = public_path('images/products/');
            $profileImage = $slug."-".date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['product_image'] = "$profileImage";
        }
        if ($request->File('product_gallery')) {
            $files = $request->file('product_gallery');
            $ar = [];
            foreach ($files as $i=>$file) {
                $destinationPath = public_path('images/products/');
                $profileImage = $slug."-".rand().$i. "." . $file->getClientOriginalExtension();
                $file->move($destinationPath, $profileImage);
                // $input['product_image'] = "$profileImage";
                array_push($ar, $profileImage);
            }

            $input['product_gallery'] = implode(', ', $ar);
        }

        Products::create($input);
        return redirect()->back()->with('success', 'Products added successfully.');

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
        $product = Products::find($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'product_image' => 'required|file|image|max:2048'
        ]);
        $input = $request->all();

        $slug = Str::slug($request->title);
        $validator = Validator::make(['slug' => $slug], [
            'slug' => [
                Rule::unique('products')->ignore($id)
            ]
        ]);
        if ($validator->fails()) {
            $slug = $request->slug = Str::slug($request->title) . '-' . time();
        }
        $input['slug'] = $slug;

        if ($image = $request->file('product_image')) {
            $destinationPath = public_path('images/products/');
            $profileImage = $slug."-".date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['product_image'] = "$profileImage";
        } else {
            unset($input['product_image']);
        }

        if ($request->File('product_gallery')) {
            $files = $request->file('product_gallery');
            $ar = [];
            foreach ($files as $i=>$file) {
                $destinationPath = public_path('images/products/');
                $profileImage = $slug."-".rand().$i. "." . $file->getClientOriginalExtension();
                $file->move($destinationPath, $profileImage);
                // $input['product_image'] = "$profileImage";
                array_push($ar, $profileImage);
            }
            $input['product_gallery'] = implode(', ', $ar);
        } else {
            unset($input['product_gallery']);
        }

        $prd = Products::find($id);
        $prd->update($input);

        return redirect()->route('products.index')->with('success','Product updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Products = Products::find($id);
        $Products->delete();
        return redirect()->route('products.index')->with('success', 'Products deleted successfully.');
    }

    /**
     * Product Search
     */
    public function search(Request $request) {
        $product = Products::where('title', 'like', '%'.$request->search.'%')->orWhere('slug', 'like', '%'.$request->search.'%')->orWhere('slug', 'like', '%'.$request->search.'%')->paginate(20);
        $search = $request->search;
        return view('admin.product.index', compact('product', 'search'));
    }

}

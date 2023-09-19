<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'image.*' => 'image',
            'value' => ['required', 'regex:/^[a-zA-Z0-9]+$/',
                Rule::unique('sliders')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ]
        ], [
            'value' => 'In shortcode value special characters and spaces are not allowed!',
            'value.unique' => 'The shortcode already created. Please entre unique value!'
        ]);
        $input = $request->all();
        $slides = [];
        $destinationPath = public_path('images/sliders/');
        if ($images = $request->file('image')) {
            foreach ($images AS $key => $img) {
                $detail =[];
                $profileImage = $request->value.'-'.date('YmdHis').'-'.$key.".".$img->getClientOriginalExtension();
                $img->move($destinationPath, $profileImage);
                $detail['img'] = $profileImage;
                $detail['text'] = $request->text[$key];
                array_push($slides, $detail);
            }
        }
        $input['slides'] = json_encode($slides);
        Slider::create($input);
        return redirect()->route('slider.index')->with('success', 'Slider created successfully.');

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
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'image.*' => 'image',
            'value' => ['required', 'regex:/^[a-zA-Z0-9]+$/',
                Rule::unique('sliders')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })->ignore($id),
            ]
        ], [
            'value' => 'In shortcode value special characters and spaces are not allowed!',
            'value.unique' => 'The shortcode already created. Please entre unique value!'
        ]);

        $input = $request->all();
        $slides = json_decode($request->slide_json);

        $newSlides = [];
        $destinationPath = public_path('images/sliders/');
        if ($request->file('image')) { $img = $request->file('image'); } else { $img = []; }
        foreach ($request->text AS $key => $sld) {
            $detail =[];
            if (isset($img[$key])) {
                $profileImage = $request->value.'-'.date('YmdHis').'-'.$key.".".$img[$key]->getClientOriginalExtension();
                $img[$key]->move($destinationPath, $profileImage);
                $detail['img'] = $profileImage;
            } else {
                $detail['img'] = $slides[$key]->img;
            }
            $detail['text'] = $sld;
            array_push($newSlides, $detail);
        }

        $input['slides'] = json_encode($newSlides);

        $sl = Slider::find($id);
        $sl->update($input);

        return redirect()->route('slider.index')->with('success', 'Slider update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
    }
}

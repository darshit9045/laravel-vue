<?php

namespace App\Http\Controllers;

use App\Models\Shortcode;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomShortcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shortcodes = Shortcode::all();
        return view('admin.shortcode.index', compact('shortcodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shortcode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'value' => ['required', 'regex:/^[a-zA-Z0-9]+$/',
                    Rule::unique('shortcodes')->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    }),
                ]
        ], [
            'value' => 'In shortcode value special characters and spaces are not allowed!',
            'value.unique' => 'The shortcode already created. Please entre unique value!'
        ]);
        $input = $request->all();

        Shortcode::create($input);
        return redirect()->route('custom-shortcode.index')->with('success', 'Shortcode created successfully.');
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

        $shortcode = Shortcode::find($id);
        return view('admin.shortcode.edit', compact('shortcode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'value' => ['required', 'regex:/^[a-zA-Z0-9]+$/',
                Rule::unique('shortcodes')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })->ignore($id),
            ]
        ], [
            'value' => 'In shortcode value special characters and spaces are not allowed!',
            'value.unique' => 'The shortcode already created. Please entre unique value!'
        ]);
        $input = $request->all();
        $shortcode= Shortcode::find($id);
        $shortcode->update($input);

        return redirect()->route('custom-shortcode.index')->with('success', 'Shortcode updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sc = Shortcode::find($id);
        $sc->delete();
        return redirect()->route('custom-shortcode.index')->with('success', 'Shortcode deleted successfully.');
    }
}

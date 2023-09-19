<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $popups = Popup::all();
        $popups = Popup::paginate(20);
        return view('admin.popup.index', compact('popups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.popup.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required|file|image|max:2048',
            'show_in' => 'required',
        ]);
        $input = $request->all();
        if (!$request->status) { $input['status'] = '0'; }
        if (!$request->show_once) { $input['show_once'] = '0'; }
        if ($image = $request->file('image')) {
            $destinationPath = public_path('images/popup/');
            $nm = basename(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
            $profileImage = $nm.'-'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Popup::create($input);
        return redirect()->route('popup.index')->with('success', 'Popup created successfully.');
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
        $popup = Popup::find($id);
        return view('admin.popup.edit', compact('popup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'file|image|max:2048',
            'show_in' => 'required',
        ]);
        $input = $request->all();
        if (!$request->status) { $input['status'] = '0'; }
        if (!$request->show_once) { $input['show_once'] = '0'; }
        if ($image = $request->file('image')) {
            $destinationPath = public_path('images/popup/');
            $nm = basename(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
            $profileImage = $nm.'-'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $popup = Popup::find($id);
        $popup->update($input);
        return redirect()->route('popup.index')->with('success', 'Popup updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $popup = Popup::find($id);
        $popup->delete();
        return redirect()->route('popup.index')->with('success', 'Popup deleted successfully.');
    }

    /**
     * Popup Status
     */
    public function status(Request $request) {
        $popup = Popup::find($request->id);
        $popup->update(['status'=>$request->status]);
        return 'Popup status updated successfully!';
    }

}

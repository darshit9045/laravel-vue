<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus= Menu::where('status', '1')->get();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
        ]);
        $result = array_combine($request->name, $request->slug);
        $menu_val = json_encode($result);

        $menu = Menu::create([
            'title' => $request->title,
            'value' => $menu_val
        ]);

        return redirect(route('menu.index'))->with('success', 'Menu added successfully!');
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
        $menus = Menu::find($id);
        return view('admin.menu.edit', compact('menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
        ]);
        $result = array_combine($request->name, $request->slug);
        $menu_val = json_encode($result);
        $menu = Menu::find($id);
        $menu->title = $request->title;
        $menu->value = $menu_val;
        $menu->update();

        return back()->with('success', 'Menu updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        $menu->status = '0';
        $menu->update();
        return back()->with('success', 'Menu deleted successfully!');
    }

    /**
     * Primary menu set
     */
    public function primary($id) {
        $oldRecord = Menu::where('id', '!=', $id)->update(['is_primary'=> '0']);

        $menu = Menu::find($id);
        $menu->is_primary = '1';
        $menu->update();
        return back()->with('success', 'Menu set as primary successfully!');
    }

}

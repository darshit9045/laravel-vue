<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Settings;

class ThemeController extends Controller
{
    /*
     * Header layout
     * */
    public function headerLayout(Request $request) {
        $setting = Settings::firstOrNew(array('name' => 'header_layout'));
        $setting->value = $request->header_layout;
        $setting->save();

        return back()->with('success', 'Header layout Updated successfully!');
    }

    /*
     * Store social/promobar
     * */
    public  function headerContent(Request $request) {
        $validated = $request->validate([
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'twitter' => 'nullable|url',
            'pinterest' => 'nullable|url',
            'youtube' => 'nullable|url',
            'telegram' => 'nullable|url',
            'phone' => 'nullable',
            'email' => 'nullable|email',
        ]);

        $content = ['PromoLine' => [$request->promoLine], 'Social' => ['facebook' => $request->facebook, 'instagram' => $request->instagram, 'whatsapp' => $request->whatsapp, 'twitter' => $request->twitter, 'pinterest' => $request->pinterest, 'youtube' => $request->youtube, 'telegram' => $request->telegram, 'phone' => $request->phone, 'email' => $request->email]];
        $content_json = json_encode($content);

        $setting = Settings::firstOrNew(array('name' => 'header_content'));
        $setting->value = $content_json;
        $setting->save();

        return back()->with('success', 'Header content Updated successfully!');
    }

    /**
     * Footer layout
     */
    public function footerLayout(Request $request) {
        $setting = Settings::firstOrNew(array('name' => 'footer_layout'));
        $setting->value = $request->footer_layout;
        $setting->save();

        return back()->with('success', 'Footer layout Updated successfully!');
    }

    /**
     * Footer Content
     */
    public function footerContent() {
        $menus = Menu::where('status', '1')->get();
        return view('admin.footer_content', compact('menus'));
    }


    /**
     * Footer Content
     */
    public function footerContentstore(Request $request) {
        $validated = $request->validate([
            'menu_order' => 'required|max:4',
        ], [
            'menu_order.max' => 'You can select up to 4 footer menu.'
        ]);

        $footer = json_encode(['menu' => $request->menu_order, 'address' => $request->address, 'copyright'=>$request->copyright]);

        $setting = Settings::firstOrNew(array('name' => 'footer_content'));
        $setting->value = $footer;
        $setting->save();

        return back()->with('success', 'Updated successfully!');
    }

    public function theme(Request $request) {
        $validated = $request->validate([
            'theme' => 'required',
        ]);

        $setting = Settings::firstOrNew(array('name' => 'theme'));
        $setting->value = $request->theme;
        $setting->save();
        return back()->with('success', 'Theme updated successfully!');
    }

}

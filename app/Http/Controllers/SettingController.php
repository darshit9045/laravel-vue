<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    /*
     * Setting Page
     * */
    public function index() {
        $pages = Page::where('status', 'Public')->get();
        return view('admin.setting.general', compact('pages'));
    }

    /*
     * Store/Update Setting
     * */
    public function store(Request $request) {
        $validated = $request->validate([
            'header_logo' => 'file|image|max:2048',
            'footer_logo' => 'file|image|max:2048',
            'admin_email' => 'email',
        ]);

        /*Site Title*/
        $setting = Settings::firstOrNew(array('name' => 'site_title'));
        $setting->value = $request->site_title;
        $setting->save();
        $path = base_path('.env');
        if (file_exists($path)) {
            $name = 'APP_NAME'; $value = str_replace(' ', '', $request->site_title);
            file_put_contents($path, str_replace(
                $name . '=' . env($name), $name . '=' . "$value", file_get_contents($path)
            ));
        }

        /*Tagline*/
        $setting = Settings::firstOrNew(array('name' => 'tagline'));
        $setting->value = $request->tagline;
        $setting->save();

        /*Admin Email*/
        $setting = Settings::firstOrNew(array('name' => 'admin_email'));
        $setting->value = $request->admin_email;
        $setting->save();

        /*Admin Contact*/
        $setting = Settings::firstOrNew(array('name' => 'admin_contact'));
        $setting->value = $request->admin_contact;
        $setting->save();

        /*Admin Address*/
        $setting = Settings::firstOrNew(array('name' => 'admin_address'));
        $setting->value = $request->admin_address;
        $setting->save();

        /*Home Page*/
        $setting = Settings::firstOrNew(array('name' => 'home_page'));
        $setting->value = $request->home_page;
        $setting->save();

        /*Search engine visibility*/
        $setting = Settings::firstOrNew(array('name' => 'search_engine_visibility'));
        $setting->value = $request->search_engine_visibility;
        $setting->save();

        /*Header Logo*/
        $destinationPath = public_path('images/');
        if ($image = $request->file('header_logo')) {
            $imgName = 'logo-'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imgName);

            $setting = Settings::firstOrNew(array('name' => 'header_logo'));
            $setting->value = "$imgName";
            $setting->save();
        }

        /*Footer Logo*/
        if ($image = $request->file('footer_logo')) {
            $imgName = 'footer-logo-'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imgName);

            $setting = Settings::firstOrNew(array('name' => 'footer_logo'));
            $setting->value = "$imgName";
            $setting->save();
        }

        /*Site Icon*/
        if ($image = $request->file('site_icon')) {
            $imgName = 'site-icon-'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imgName);

            $setting = Settings::firstOrNew(array('name' => 'site_icon'));
            $setting->value = "$imgName";
            $setting->save();
        }

        return back()->with('success', 'Setting Updated successfully!');
    }

    /**
     * Email Settings
     */
    public function email() {
        return view('admin.setting.email');
    }
    public function email_update(Request $request) {
        $validated = $request->validate([
            'MAIL_MAILER' => 'required',
            'MAIL_HOST' => 'required',
            'MAIL_PORT' => 'required|numeric',
            'MAIL_USERNAME' => 'required',
            'MAIL_PASSWORD' => 'required',
            'MAIL_ENCRYPTION' => 'required',
            'MAIL_FROM_ADDRESS' => 'required|email',
        ]);

        /*Contact Email*/
        $setting = Settings::firstOrNew(array('name' => 'contact_email'));
        $setting->value = $request->MAIL_FROM_ADDRESS;
        $setting->save();

        $path = base_path('.env');
        if (file_exists($path)) {
            $inputs = $request->all();
            foreach ($inputs AS $key=>$val) {
                if ($key == '_token') { continue; }

                file_put_contents($path, str_replace(
                    $key . '=' . env($key), $key . '=' . $val, file_get_contents($path)
                ));
            }
            return back()->with('success', 'Email detting Updated successfully!');
        }
        return back()->with('error', 'Whoops! There were some problems.');
    }

    /**
     * Custom CSS
     */
    public function custom_css() {
        $css = Settings::where('name', 'custom_css')->first();
        return view('admin.setting.custom_css', compact('css'));
    }

    public function custom_css_update(Request $request) {
        if (!$request->status) { $st = '0'; } else { $st = '1'; }
        $setting = Settings::firstOrNew(array('name' => 'custom_css'));
        $setting->value = $request->custom_css;
        $setting->status = $st;
        $setting->save();

        return back()->with('success', 'CSS Updated successfully!');
    }

    /**
     * Custom JS
     */
    public function custom_js() {
        $header_js = Settings::where('name', 'header_js')->first();
        $footer_js = Settings::where('name', 'footer_js')->first();
        return view('admin.setting.custom_js', compact(['header_js', 'footer_js']));
    }

    public function custom_js_update(Request $request) {
        if (!$request->header_js_status) { $hst = '0'; } else { $hst = '1'; }
        if (!$request->footer_js_status) { $fst = '0'; } else { $fst = '1'; }
        /*Header JS*/
        $setting = Settings::firstOrNew(array('name' => 'header_js'));
        $setting->value = $request->header_js;
        $setting->status = $hst;
        $setting->save();
        /*Footer JS*/
        $setting = Settings::firstOrNew(array('name' => 'footer_js'));
        $setting->value = $request->footer_js;
        $setting->status = $fst;
        $setting->save();

        return back()->with('success', 'CSS Updated successfully!');
    }

    /**
     * GDPR Setting
     */
    public  function gdpr() {
        $gdpr = Settings::where('name', 'gdpr')->first();
        return view('admin.setting.gdpr', compact('gdpr'));
    }
    public function gdpr_update(Request $request) {
        if (!$request->status) { $st = '0'; } else { $st = '1'; }
        $setting = Settings::firstOrNew(array('name' => 'gdpr'));
        $setting->value = $request->gdpr;
        $setting->status = $st;
        $setting->save();

        return back()->with('success', 'GDPR Updated successfully!');
    }

    public function change_password(Request $request) {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail(__('The current password is incorrect.'));
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', __('Your password has been updated.'));
    }

}

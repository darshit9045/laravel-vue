<?php

/**
 * Get setting table value by name
 */
if (!function_exists('get_setting')) {
    function get_setting($name) {
        $settings = App\Models\Settings::where(['name'=> $name, 'status'=>'1'])->first();
        if ($settings) {
            return $settings->value;
        } else {
            return '';
        }
    }
}

/**
 * Get primary menu
 */
if (!function_exists('get_primary_menu')) {
    function get_primary_menu() {
        if ($menus = \App\Models\Menu::where('status', '1')->count() === 0) {
            return json_encode([]);
        }
        $menus = \App\Models\Menu::where('is_primary', '1')->where('status', '1')->first();
        if (!$menus) {
            $menus = \App\Models\Menu::where('status', '1')->first();
        }
        return $menus->value;
    }
}

/**
 * Get Menu By ID
 */
if (!function_exists('get_menu')) {
    function get_menu($id) {
        if ($menus = \App\Models\Menu::where('status', '1')->count() === 0) {
            return json_encode([]);
        }
        $menus = \App\Models\Menu::where('status', '1')->where('id', $id)->first();
        return $menus;
    }
}

/**
 * Get categories
 */
if (!function_exists('get_cat')) {
    function get_cat($id) {
        if (\App\Models\Category::whereIn('id', explode(', ', $id))->count() === 0) {
            return json_encode([]);
        }
        $categories = \App\Models\Category::select('name', 'slug')->whereIn('id', explode(', ', $id))->get();
        return $categories;
    }
}

/**
 * Get tags
 */
if (!function_exists('get_tag')) {
    function get_tag($id) {
        if (\App\Models\Tag::whereIn('id', explode(', ', $id))->count() === 0) {
            return json_encode([]);
        }
        $tags = \App\Models\Tag::select('name', 'slug')->whereIn('id', explode(', ', $id))->get();
        return $tags;
    }
}

/**
 * Show Popup
 */
if (!function_exists('show_popup')) {
    function show_popup() {
        if(get_setting('home_page')) {$prm = get_setting('home_page');} else {$prm = '';}
        if (\Illuminate\Support\Facades\Route::currentRouteName() == 'page.home' || \Illuminate\Support\Facades\Config::get('current_page') == $prm){
            $popups = \App\Models\Popup::where('status', '1')->get();
        } else {
            $popups = \App\Models\Popup::where(['status' => '1', 'show_in' => '0'])->get();
        }
        $popup_no = 0; $delay = 0;

        foreach ($popups AS $popup) {
            ?>
            <div id="popup-<?= $popup->id ?>" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                            <img src="<?php echo asset('images/popup/'.$popup->image) ?>" title="<?php echo $popup->title; ?>" class="w-100 pb-2">
                            <?php echo $popup->description; ?>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    var show_once = '<?php echo $popup->show_once; ?>';
                    var id = '<?php echo $popup->id; ?>';
                    if (('1' == show_once && localStorage.getItem('isPopup'+id) == null) ||  '0' == show_once) {
                        setTimeout(function() {
                            $("#popup-"+id).modal('show');
                            localStorage.setItem('isPopup'+id, true);
                        }, <?= $delay ?>);
                    }

                });
            </script>
            <?php
            $popup_no++; $delay = $popup_no * 2000;
        }

    }
}

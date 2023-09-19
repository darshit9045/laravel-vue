<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomShortcodeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\PopupController;

/*Frontend Controller*/
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\GalleryViewController;
use App\Http\Controllers\Frontend\PageviewController;

/* Product Controller */
use App\Http\Controllers\Product\ProductController;

/* RealEstate Controller */
use App\Http\Controllers\Realestate\RealestateController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Admin Route
 */
Auth::routes();
Route::middleware(['auth','isAuth'])->group(function(){
    // Manage pages
    Route::get('pages/public',[PageController::class,'public'])->name('pages.public');
    Route::get('pages/draf',[PageController::class,'draf'])->name('pages.draf');
    Route::get('pages/trashed',[PageController::class,'trashed'])->name('pages.trashed');
    Route::post('pages/trashed/{id}',[PageController::class,'trashedDelete'])->name('pages.trashed.destroy');
    Route::post('pages/update-status', [PageController::class,'updateStatus'])->name('pages.update_status');
    Route::post('pages/search', [PageController::class,'search'])->name('pages.search');

    Route::prefix('admin')->group(function(){
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('pages', PageController::class);

        // Manage Setting
        Route::prefix('setting')->group(function(){
            Route::get('/',[SettingController::class,'index'])->name('setting.index');
            Route::post('/',[SettingController::class,'store'])->name('setting.store');
            Route::get('email',[SettingController::class,'email'])->name('setting.email');
            Route::post('email',[SettingController::class,'email_update'])->name('setting.email.update');
            Route::get('custom-css',[SettingController::class,'custom_css'])->name('setting.custom.css');
            Route::post('custom-css',[SettingController::class,'custom_css_update'])->name('setting.css.update');
            Route::get('custom-js',[SettingController::class,'custom_js'])->name('setting.custom.js');
            Route::post('custom-js',[SettingController::class,'custom_js_update'])->name('setting.js.update');
            Route::get('gdpr',[SettingController::class,'gdpr'])->name('setting.gdpr');
            Route::post('gdpr',[SettingController::class,'gdpr_update'])->name('setting.gdpr.update');
            Route::get('change-password', function(){
                return view('admin.setting.change-password');
            })->name('setting.change-password');
            Route::post('change-password',[SettingController::class,'change_password'])->name('password.update');
        });

        // Manage Menu
        Route::resource('menu', MenuController::class);
        Route::get('menu/{id}/primary', [MenuController::class, 'primary'])->name('menu.primary');

        // Manage Header
        Route::get('header-layout', function(){
            return view('admin.header_layout');
        })->name('setting.headerlayout');
        Route::post('header-layout', [ThemeController::class, 'headerLayout'])->name('setting.headerlayout.store');
        Route::get('header-content', function(){
            return view('admin.header_content');
        })->name('setting.headercontent');
        Route::post('header-content', [ThemeController::class, 'headerContent'])->name('setting.headercontent.store');
        Route::get('theme', function(){
            return view('admin.theme');
        })->name('setting.theme');
        Route::post('theme', [ThemeController::class, 'theme'])->name('setting.theme.store');

        // Manage Footer
        Route::get('footer-layout', function(){
            return view('admin.footer_layout');
        })->name('setting.footerlayout');
        Route::post('footer-layout', [ThemeController::class, 'footerLayout'])->name('setting.footerlayout.store');
        Route::get('footer-content', [ThemeController::class, 'footerContent'])->name('setting.footercontent');
        Route::post('footer-content', [ThemeController::class, 'footerContentstore'])->name('setting.footercontent.store');

        // Popup
        Route::resource('popup', PopupController::class)->except(['show']);
        Route::get('popup-status', [PopupController::class, 'status'])->name('popup.status');

        // Manage Blogs
        Route::resource('blog', BlogController::class);
        Route::post('blog/trashed/{id}', [BlogController::class, 'trashedDelete'])->name('blog.trashed.destroy');
        Route::get('blogs/public',[BlogController::class,'public'])->name('blog.public');
        Route::get('blogs/draf',[BlogController::class,'draf'])->name('blog.draf');
        Route::get('blogs/trashed',[BlogController::class,'trashed'])->name('blog.trashed');
        Route::post('blogs/update-status', [BlogController::class,'updateStatus'])->name('blog.update_status');
        Route::post('blogs/search', [BlogController::class,'search'])->name('blog.search');

        Route::resource('categories', CategoriesController::class)->only(['index', 'store','edit', 'update', 'destroy']);
        Route::resource('tag', TagController::class)->only(['index', 'store','edit', 'update', 'destroy']);

        // manage ShortCode
        Route::resource('testimonial', TestimonialController::class)->except(['show']);
        Route::resource('slider', SliderController::class)->except(['show']);
        Route::resource('form', FormController::class)->only(['index', 'store']);
        Route::resource('custom-shortcode', CustomShortcodeController::class)->except(['show']);

        Route::get('contact', [FormController::class, 'contact'])->name('admin.contact');

        // Gallery Route
        Route::resource('gallery/category', GalleryCategoryController::class)->except(['show','create'])->names(['index' => 'GalleryCategory.index',  'store' => 'GalleryCategory.store',  'edit' => 'GalleryCategory.edit', 'update' => 'GalleryCategory.update', 'destroy' => 'GalleryCategory.destroy']);
        Route::resource('gallery', GalleryController::class)->except(['show']);
        Route::post('gallery/upload', [GalleryController::class, 'upload'])->name('gallery.upload');
        Route::post('gallery/search', [GalleryController::class, 'search'])->name('gallery.search');

        // Product Route
        Route::resource('products', ProductController::class)->except(['show']);
        Route::post('products/search', [ProductController::class, 'search'])->name('products.search');

        // RealEstate Route
        Route::resource('project', RealestateController::class)->except(['show']);

        //RealEstate Route
        Route::resource('category', CategoryController::class)->only(['index', 'store','edit', 'update', 'destroy']);
        Route::resource('projects', ProjectsController::class);

    });
});

/**
 * Frontend Route
 */
//Route::get('/frontend/copymatic', [PageviewController::class, 'copymatic'])->name('page.copymatic');

Route::get('/frontend/gallery/{id}/view', [GalleryViewController::class, 'getGalleries'])->name('gallery.getGalleries');
//Route::get('/', [PageviewController::class, 'home'])->name('page.home');
Route::get('/', [PageviewController::class, 'vue_home'])->name('page.home');
Route::get('/about-us', [PageviewController::class, 'vue_about_us'])->name('page.aboutus');
Route::get('/contact-us', [PageviewController::class, 'vue_contact_us'])->name('page.contactus');
Route::get('/residential-projects', [PageviewController::class, 'vue_residential_projects'])->name('page.residential_projects');
Route::get('/commercial-projects', [PageviewController::class, 'vue_commercial_projects'])->name('page.commercial_projects');
Route::get('/malabar-exotica', [PageviewController::class, 'vue_malabar_exotica'])->name('page.malabar_exotica');
Route::get('/{slug}', [PageviewController::class, 'page_view'])->name('page.view')->where('slug', '^(?!login|sitemap.xml|blog|!blog\/$).*');
Route::get('/blog', [PageviewController::class, 'blog'])->name('page.blog');
Route::get('/blog/s', [PageviewController::class, 'blogSearch'])->name('blog.serach');
Route::get('/blog/{slug}', [PageviewController::class, 'blog_detail'])->name('blog.detail');
Route::post('/frontend/contact', [ContactController::class, 'contact'])->name('frontend.contact');
Route::get('/sitemap.xml', [PageviewController::class, 'sitemap'])->name('page.sitemap');


Route::get('/login', function (){
    return view('auth.login');
})->name('login')->where('slug', 'login');

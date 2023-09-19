<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PageviewController extends Controller
{
    /*
     * Home page
     * */
    public function vue_home(){
        return view('vue/home_view');
    }

    public function vue_about_us(){
        return view('vue/about_us');
    }

    public function vue_contact_us(){
        return view('vue/contact_us');
    }

    public function vue_residential_projects(){
        return view('vue/residential_projects');
    }

    public function vue_commercial_projects(){
        return view('vue/commercial_projects');
    }

    public function vue_malabar_exotica(){
        return view('vue/malabar_exotica');
    }

    public function home() {
        if (get_setting('home_page')) {
            $page = Page::where(['status' => 'Public', 'id' => get_setting('home_page')])->first();
            if($page->slug == 'blog') {
                $blogs = Blog::where('status', '1')->orderBy('id', 'desc')->paginate(12);
                Config::set('current_page', $page->id);
                return view('frontend.blog', compact(['page', 'blogs']));
            } elseif ($page && $page->slug != 'blog') {
                Config::set('current_page', $page->id);
                return view('frontend.realestate.page_view', ['page' => $page]);
//                return view('frontend.page_view', ['page' => $page]);
            } else {
                $page = Page::where('status', 'Public')->first();
                if ($page) {
                    Config::set('current_page', $page->id);
                    return view('frontend.page_view', ['page' => $page]);
                } else {
                    Config::set('current_page', 0);
                    return view('welcome');
                }
            }
        } else {
            $page = Page::where('status', 'Public')->whereNot('slug', 'blog')->first();
            if ($page) {
                Config::set('current_page', $page->id);
                return view('frontend.page_view', ['page' => $page]);
            } else {
                Config::set('current_page', 0);
                return view('welcome');
            }
        }
//        $page = Page::find()
    }
    /*
     * Page preview by slug
     * */
    public function page_view($slug) {
        $page = Page::where('slug', $slug)->first();
        if (!is_null($page) && $page->status == "Public") {
            Config::set('current_page', $page->id);
            return view('frontend.page_view', ['page' => $page]);
        } elseif (!is_null($page) && $page->status == "Trash") {
            Config::set('current_page', 0);
            return abort(404);
        } elseif (!is_null($page) && $page->status == "Draft") {
            Config::set('current_page', 0);
            return abort(404);
        } else {
            Config::set('current_page', 0);
            return abort(404);
        }
    }

    /*
     * Blog List page
     * */
    public function blog() {
        $page = Page::where('slug', 'blog')->first();
        $blogs = Blog::where('status', '1')->orderBy('id', 'desc')->paginate(12);
        Config::set('current_page', $page->id);
        return view('frontend.blog', compact(['page', 'blogs']));
    }

    /*
     * Blog Detail Page
     * */
    public function blog_detail($slug){
        $blog = Blog::where('slug', $slug)->where('status', 1)->first();

        if ($blog) {
            if (!session()->has('blog_' . $blog->id . '_viewed')) {
                $blog = Blog::findOrFail($blog->id);
                $blog->increment('views');
                session(['blog_' . $blog->id . '_viewed' => true]);
            }
            $recent_blogs = Blog::where('status', '1')->orderBy('id', 'desc')->take(4)->get();
            Config::set('current_page', 0);
            return view('frontend.blog_detail', compact(['blog', 'recent_blogs']));
        } else {
            return abort(404);
        }
    }

    /**
    * Sitemap
     */
    public  function sitemap() {

        $pages = Page::where('status', 'Public')->get();
        $posts = Blog::all();
        return response()->view('sitemap', [
            'pages' => $pages,
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');

    }

    /**
     * Blog Search
     */
    public function blogSearch(Request $request){
        $page = Page::where('slug', 'blog')->first();
        $blogs = Blog::where('status', '1')->where('title', 'like', '%'.$request->s.'%')->orderBy('id', 'desc')->paginate(12);
        Config::set('current_page', $page->id);
        return view('frontend.blog', compact(['page', 'blogs']));
    }

}

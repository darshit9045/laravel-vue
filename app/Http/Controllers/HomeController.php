<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pages = Page::where('status', 'Public')->count();
        $blogs = Blog::where('status', '1')->count();
        $messages = Contact::all()->count();
        $media = Gallery::all()->count();

        $user_activities = UserActivity::latest()->take(5)->get();
        $contacts = Contact::latest()->take(5)->get();
        $last_blogs = Blog::where('status', '1')->latest()->take(5)->get();

        return view('home', ['pages'=>$pages, 'blogs'=>$blogs, 'messages'=>$messages, 'user_activities'=>$user_activities, 'media'=>$media, 'contacts'=>$contacts, 'last_blogs'=>$last_blogs]);
    }
}

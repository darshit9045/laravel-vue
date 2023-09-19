<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryViewController extends Controller
{
    public function getGalleries(Request $request, $id)
    {
        $perPage = 12;
        $page = $request->input('page') ?? 1;
        $offset = ($page - 1) * $perPage;
        if ($id) {
            $pages = Gallery::where('category_id', $id)->orderBy('created_at', 'desc')->paginate($perPage);
        } else {
            $pages = Gallery::orderBy('created_at', 'desc')->orderBy('created_at', 'desc')->paginate($perPage);

        }

        return response()->json([
            'status' => 'success',
            'galleries' => $pages
        ]);
    }
}

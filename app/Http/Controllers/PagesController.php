<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->limit(6)->get();
        $latest_post = Post::orderBy('id', 'DESC')->first();

        return view('index', compact('posts', 'latest_post'));
    }
}

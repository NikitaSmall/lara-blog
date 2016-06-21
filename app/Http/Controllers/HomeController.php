<?php

namespace App\Http\Controllers;

use App\Post;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::where('published', 1)->get();
      return view('home.index', [
        'posts' => $posts,
      ]);
    }

    public function view(Request $request) {
      return view('home.post');
    }
}

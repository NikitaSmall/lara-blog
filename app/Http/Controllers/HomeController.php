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

    public function view($post_id) {
      $post = Post::findOrFail($post_id);

      return view('home.post', [
        'post' => $post,
      ]);
    }

    public function profile(Request $request) {
      $user = $request->user();

      return view('home.profile', [
        'user' => $user,
      ]);
    }

    public function change_profile(Request $request) {
      $user = $request->user();

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $fileName = rand(11111,99999) . '.' . $extension;

        $image->move($user->imagePath(), $fileName);

        $user->update([
          'image' => $user->imagePath() . '/' . $fileName,
        ]);
      }

      if ($request->name && !empty($request->name) && ($request->name != $user->name)) {
        $this->validate($request, [
          'name' => 'required|max:255|unique:users',
        ]);

        $user->update([
          'name' => $request->name,
        ]);
      }

      if ($request->pass && !empty($request->pass)) {
        $this->validate($request, [
          'pass' => 'required|confirmed|max:255|min:6',
        ]);

        $user->update([
          'password' => bcrypt($request->pass),
        ]);
      }

      return redirect('/profile');
    }
}

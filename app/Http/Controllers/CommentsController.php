<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;

class CommentsController extends Controller
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

    public function create(Request $request) {
      $this->validate($request, [
        'body' => 'required',
      ]);

      $request->user()->comments()->create([
        'body' => $request->body,
        'post_id' => $request->post_id,
      ]);

      return redirect('/view/' . $request->post_id);
    }

    public function index() {
      $comments = Comment::all();

      return view('comments.index', [
        'comments' => $comments,
      ]);
    }

    public function change_status($id) {
      $comment = Comment::find($id);
      $comment->update([
        'visible' => !$comment->visible,
      ]);

      return redirect('/admin/comments');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index() {
      $users = User::all();
      return view('users.index', [
        'users' => $users,
      ]);
    }

    public function to_user($id) {
      $user = User::find($id);
      $user->makeUser();

      return redirect('/admin/users');
    }

    public function to_moderator($id) {
      $user = User::find($id);
      $user->makeModerator();

      return redirect('/admin/users');
    }

    public function to_admin($id) {
      $user = User::find($id);
      $user->makeAdmin();

      return redirect('/admin/users');
    }
}

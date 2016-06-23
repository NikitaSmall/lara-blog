@extends('layouts.admin')

@section('content')
  <div class="panel panel-default">
    <div class="panel-body">
      On this page you may change users roles.
    </div>
  </div>
  </br>

  <table class="table table-striped">
    <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        @include('users.user', array('user' => $user))
      @endforeach
    </tbody>
  </table>
@endsection

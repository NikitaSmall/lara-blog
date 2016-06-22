@extends('layouts.admin')

@section('content')
  <div class="panel panel-default">
    <div class="panel-body">
      Welcome to the admin main page!
      You may create new post here:
      <a href="{{ route('admin.posts.create') }}">Create great new post!</a>
    </div>
  </div>
  </br>

  <table class="table table-striped">
    <thead>
    <tr>
      <th>Title</th>
      <th>Author</th>
      <th>Published</th>
      <th></th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        @include('posts.post', array('post' => $post))
      @endforeach
    </tbody>
  </table>


@endsection

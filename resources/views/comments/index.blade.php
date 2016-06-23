@extends('layouts.admin')

@section('content')
  <div class="panel panel-default">
    <div class="panel-body">
      Comments:
    </div>
  </div>
  </br>

  <table class="table table-striped">
    <thead>
    <tr>
      <th>Text</th>
      <th>Author</th>
      <th>Published</th>
    </tr>
    </thead>
    <tbody>
      @foreach($comments as $comment)
        @include('comments.comment', array('comment' => $comment))
      @endforeach
    </tbody>
  </table>

@endsection

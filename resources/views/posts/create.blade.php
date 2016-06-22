@extends('layouts.admin')

@section('content')
  <h3>Create new post:</h3>
  @include('errors.common')

  <form action="{{ route('admin.posts.store') }}" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
      <label>
        Post title
      </label>
      <input type="text" class="form-control" name="title" placeholder="Title">
    </div>

    <div class="form-group">
      <label>
        Post text
      </label>
      <textarea class="form-control" name="body" placeholder="Main Text"></textarea>
    </div>

    <div class="checkbox">
      <label>
        <input type="checkbox" name="published" value="1"
        @if(Auth::user()->isAdmin())
          checked="true"
        @else
          disabled="true"
        @endif
        > Published?
      </label>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
@endsection

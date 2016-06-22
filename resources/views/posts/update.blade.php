@extends('layouts.admin')

@section('content')
  <h3>Update post post:</h3>
  @include('errors.common')

  <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="form-group">
      <label>
        Post title
      </label>
      <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $post->title }}">
    </div>

    <div class="form-group">
      <label>
        Post text
      </label>
      <textarea class="form-control" name="body" placeholder="Main Text">{{ $post->body }}</textarea>
    </div>

    <div class="checkbox">
      <label>
        <input type="checkbox" name="published" value="1"
        @if($post->published)
          checked=""
        @endif
        @if(!Auth::user()->isAdmin())
          disabled="true"
        @endif
        > Published?
      </label>
    </div>

    <button type="submit" class="btn btn-default">Update post!</button>
  </form>
@endsection

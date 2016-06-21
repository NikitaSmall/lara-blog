@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="col-md-12">
        <div class="post">
          <h2>
              {{ $post->title }}
          </h2>
          <p class="lead">
              by <span class="btn-link">{{ $post->user->name }}</span>
          </p>
          <p><span class="glyphicon glyphicon-time"></span> Posted on {{ date('F d, Y, H:i', strtotime($post->created_at)) }}</p>
          <hr>
          <p>
            {{ $post->body }}
          </p>
          <hr>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="col-md-12">
        <div class="comments">
          <h2>
              Comments:
          </h2>
          @foreach($post->comments as $comment)
            <p>
              <span class="glyphicon glyphicon-time"></span>
              Posted on {{ date('F d, Y, H:i', strtotime($comment->created_at)) }}
              by <span class="btn-link">{{ $comment->user->name }}</span>:
            </p>
            <hr>
            <p>
              {{ $comment->body }}
            </p>
            <hr>
          @endforeach

          @include('errors.common')

          @if(Auth::check())
          <form action="{{ route('create_comment') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" value="{{ $post->id }}" name="post_id">
            <div class="col-md-10">
              <textarea class="form-control" name="body" placeholder="Comment to write"></textarea>
            </div>

            <input type="submit" value="Send comment!" class="btn btn-info col-md-2">
          </form>
          @else
            <a href="{{ url('/login') }}">Login to write new comments!</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

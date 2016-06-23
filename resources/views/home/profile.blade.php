@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <h2>Your user profile:</h2>

            <div>Username: {{ $user->name }}</div>
            <div>Your role: {{ $user->role->name }}</div>

            <div>
              <label>Your profile image: </label>
              <br>
              <img style="max-height: 300px;" src="{{ $user->image ?: '/images/default.png' }}" alt="user-profile" class="img-thumbnail">
            </div>

            <div>
              <label>
                Your's posts:
              </label>

              <ul>
                @foreach($user->posts as $post)
                  <li class="list-item">
                    <a href="{{ route('view', $post->id) }}">{{ $post->title }}</a>
                  </li>
                @endforeach
              </ul>
            </div>

            <br>

            @include('errors.common')

            <form enctype="multipart/form-data" action="{{ route('change_profile') }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

              <input type="text" name="name" value="{{ $user->name }}" placeholder="Your name" class="form-control"><br>

              <input type="password" name="pass" placeholder="New password" class="form-control"><br>
              <input type="password" name="pass_confirmation" placeholder="repeat new password" class="form-control"><br>

              <div>
                <label>
                  Upload new picture <input type="file" name="image">
                </label>
              </div><br>

              <input type="submit" value="Change profile" class="btn btn-default">
            </form>
          </div>
      </div>
  </div>
@endsection

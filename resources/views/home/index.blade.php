@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  @if(count($posts) == 0)
                    Wait for our cool new blogposts!
                  @else
                    Read newest and coolest blogposts!
                  @endif
                </div>

                <div class="col-md-12">
                  @foreach($posts as $post)
                    <div class="post">
                      <h2>
                          <a href="{{ route('view', $post->id) }}"> {{ $post->title }} </a>
                      </h2>
                      <p class="lead">
                          by <span class="btn-link">{{ $post->user->name }}</span>
                      </p>
                      <p><span class="glyphicon glyphicon-time"></span> Posted on {{ date('F d, Y, H:i', strtotime($post->created_at)) }}</p>
                      <hr>
                      <p>
                        {{ str_limit($post->body, 150) }}
                      </p>
                      <a class="btn btn-primary" href="{{ route('view', $post->id) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                      <hr>
                    </div>
                  @endforeach
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

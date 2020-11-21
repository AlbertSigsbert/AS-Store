@extends('partials.pagetemplate')

@section('title' ,'Blog')

@section('extra-css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection
@section('page-content')

  @include('partials.carousel')

  <div class="jumbotron pb-2 mb-0">
    <h1 class="display-5 text-center">Featured Blog Posts</h1>
  </div>

    <div class="jumbotron mx-auto row  mb-0">
        <div class="card-deck">
            @foreach ($posts as $post)
            <div class="card  bg-light border-light">
                <img class="card-img-top" src="{{ productImage($post->image) }}" alt="blog-post-image">
                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <p class="card-text"> {{$post->excerpt}}</p>
                  <a href="{{ route('blog.show' , $post->slug)}}" class="btn btn-primary">Read More</a>
                </div>
              </div>
            @endforeach

        </div>
        </div>
    </div>

@endsection



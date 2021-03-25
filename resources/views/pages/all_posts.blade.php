@extends('layouts.app')
@section('content')

  <!-- Page Content -->
  <div class="container">

    @include('inc.jumbotron')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">{{config('app.name')}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{config('app.posts_page_name')}}</li>
        </ol>
    </nav>
    <!-- /.row -->
    <h1 class="text-center">{{config('app.posts_page_name')}}</h1>

    <div class="row">
        <div class="col-lg-3">
            @include('inc.sidebar')
        </div>
        <div class="col-lg-9">
            @foreach ($posts as $post)

            <!-- Project One -->
            <div class="row">
                <div class="col-md-7">
                <a href="{{route('visitor.post.show', $post->slug)}}">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="{{$post->getFirstMediaUrl('images', 'thumb')}}" alt="{{$post->name}}">
                </a>
                </div>
                <div class="col-md-5">
                    <a href="{{route('visitor.post.show', $post->slug)}}">
                        <h3>{{$post->name}}</h3>
                    </a>
                <p>{{ \Illuminate\Support\Str::limit($post->content, 350, '...') }}</p>
                <p>{{$post->updated_at->formatLocalized(config('app.datetime_format'))}}</p>
                <a class="btn btn-primary" href="{{route('visitor.post.show', $post->slug)}}">Rodyti</a>
                </div>
            </div>
            <!-- /.row -->
            <hr>
            @endforeach

        </div>
    </div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>
  </div>
  <!-- /.container -->

@endsection

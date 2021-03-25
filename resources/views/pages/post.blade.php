@extends('layouts.app')
@section('content')

  <!-- Page Content -->
  <div class="container">

    @include('inc.jumbotron')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">{{config('app.name')}}</a></li>
          <li class="breadcrumb-item"><a href="{{route('visitor.post.index')}}">{{config('app.posts_page_name')}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$post->name}}</li>
        </ol>
    </nav>

    <!-- Page Features -->

  <!-- Page Content -->

    <div class="row">

      <div class="col-lg-3">
        @include('inc.sidebar')
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
     <!-- Title -->
        <h1 class="mt-4">{{$post->name}}</h1>

        <!-- Date/Time -->
        <p>{{$post->updated_at->formatLocalized(config('app.datetime_format'))}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{$post->getFirstMediaUrl('images', 'compressed')}}" alt="{{$post->name}}">

        <hr>
        <!-- Post Content -->
        <p class="lead">{{$post->content}}</p>

        <hr>
        @include('inc.facebook')

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- Page Features -->
  </div>
  <!-- /.container -->


@endsection

@extends('layouts.app')
@section('content')
  <!-- Page Content -->
  <div class="container">


    @include('inc.jumbotron')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">{{config('app.name')}}</a></li>
          <li class="breadcrumb-item"><a href="{{route('visitor.category.show', $product->category->slug)}}">{{$product->category->name}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
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
        <div class="card my-4 mt-4">
            <img id="image" class="card-img-top img-fluid d-none d-lg-block" src="{{ $product->getFirstMediaUrl('images', 'compressed') }}" alt="{{$product->name}}">
            <div class="row container">
                @foreach ($product->getMedia('images') as $image)
                        <div class="col-lg-3 my-3">
                            <img class="thumbnail card-img-top img-fluid" src="{{ $image->getUrl('compressed') }}" alt="{{$product->name}}">
                        </div>
                @endforeach
            </div>


          <div class="card-body">
            <h1 class="card-title">{{$product->name}}</h1>
            <div class="row container">
              @isset($product->sale_price)
                <del><h4>{{config('app.currency')}}{{$product->price}}</h4></del>
                <h4 class="discount ml-4">{{config('app.currency')}}{{$product->sale_price}}</h4>
              @else
                <h4>{{config('app.currency')}}{{$product->price}}</h4>
              @endisset
            </div>
            <p class="card-text">{{$product->description}}</p>
            <a href="{{route('contact')}}"><button type="button" class="btn btn-warning mt-4"> {{config('app.contact_page_name')}}</button></a>
          </div>

        </div>
        <!-- /.card -->
        <!-- Facebook -->
        @include('inc.facebook')
        <!-- / Facebook -->
      </div>
      <!-- /.col-lg-9 -->

    </div>

    <!-- Page Features -->
  </div>
  <!-- /.container -->



@endsection


@extends('layouts.app')
@section('content')

  <!-- Page Content -->
  <div class="container">

    @include('inc.jumbotron')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">{{config('app.name')}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$active_category->name}}</li>
        </ol>
    </nav>

    <!-- Page Features -->
    <div class="card-header"><h1 class="text-center">{{$active_category->name}}</h1></div>
    <div class="row">
        <!-- SideBar -->
        <div class="col-lg-3">
            @include('inc.sidebar')
        </div>
        <!-- Content -->
        <div class="col-lg-9">
            @foreach ($products as $product)
                @include('inc.product_listing')
            @endforeach
        </div>
    </div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $products->links() !!}
    </div>
  </div>
  <!-- /.container -->


@endsection

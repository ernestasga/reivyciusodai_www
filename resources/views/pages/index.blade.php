@extends('layouts.app')
@section('content')

  <!-- Page Content -->
  <div class="container">

    @include('inc.jumbotron')
    @include('inc.search')

    <div class="row">
        <div class="col-md-8 mb-5">
          <h1>Apie mus</h1>
          <hr>
          <p>{{config('app.about_us_p1')}}</p>
          <p>{{config('app.about_us_p2')}}</p>

        </div>
        <div class="col-md-4 mb-5">
          <a href="{{route('contact')}}"><h2>{{config('app.contact_page_name')}}</h2></a>
          <hr>
          <address>
            <strong>{{config('app.name')}}</strong>
            <br>
            <i class="fas fa-globe" style="color:rgb(161, 156, 156)"></i>
            {{config('app.address')}}
            <br>
          </address>
          <address>
            <i class="fas fa-phone" style="color:rgb(161, 156, 156)"></i>
            <a href="tel:{{config('app.phone_1')}}">{{config('app.phone_1')}}</a>
            <br>
            @if (config('app.phone_2'))
                <i class="fas fa-phone" style="color:rgb(161, 156, 156)"></i>
                <a href="tel:{{config('app.phone_2')}}">{{config('app.phone_2')}}</a>
                <br>
            @endif
            <br>
            <i class="fas fa-envelope" style="color:rgb(161, 156, 156)"></i>
            <a href="mailto:{{config('app.email_1')}}">{{config('app.email_1')}}</a>
            <br>
            @if (config('app.email_2'))
                <i class="fas fa-envelope" style="color:rgb(161, 156, 156)"></i>
                <a href="mailto:{{config('app.email_2')}}">{{config('app.email_2')}}</a>
                <br>
            @endif
          </address>
        </div>
      </div>

    <!-- Page Features -->
    <div class="card-header m-2"><h2 class="text-center">Kategorijos</h2></div>
    @include('inc.categories_list')
    <!-- /.row -->
    <div class="card-header m-2"><h2 class="text-center">Išpardavimas</h2></div>
    @include('inc.sale_slider')
    <div class="card-header m-2"><h2 class="text-center">Populiarūs</h2></div>
    @include('inc.popular_slider')
  </div>
  <!-- /.container -->

@endsection

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

  <!-- Page Content -->
  <div class="container my-5">

    @include('inc.jumbotron')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">{{config('app.name')}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{config('app.contact_page_name')}}</li>
        </ol>
    </nav>

    <h1 class="text-center">{{config('app.contact_page_name')}}</h1>

    <hr>
    <div class="row">
      <div class="col-sm-8">
        <iframe src="{{config('app.google_maps_url')}}" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>

      <div class="col-sm-4" id="contact2">
          <h3>{{config('app.name')}}</h3>
          <hr align="left" width="50%">
          <h4 class="pt-2">Adresas</h4>
          <i class="fas fa-globe" style="color:#000"></i> {{config('app.address')}}<br>
          <h4 class="pt-2">Tel.</h4>
          <i class="fas fa-phone" style="color:#000"></i> <a href="tel:{{config('app.phone_1')}}"> {{config('app.phone_1')}} </a><br>
          @if (config('app.phone_2'))
            <i class="fas fa-phone" style="color:#000"></i> <a href="tel:{{config('app.phone_2')}}"> {{config('app.phone_2')}} </a><br>
          @endif
          <h4 class="pt-2">El. paštas</h4>
          <i class="fa fa-envelope" style="color:#000"></i> <a href="mailto:{{config('app.email_1')}}">{{config('app.email_1')}}</a><br>
          @if (config('app.email_2'))
            <i class="fa fa-envelope" style="color:#000"></i> <a href="mailto:{{config('app.email_2')}}">{{config('app.email_2')}}</a><br>
          @endif
        </div>
    </div>
  </div>

  </div>
  <!-- /.container -->

@endsection

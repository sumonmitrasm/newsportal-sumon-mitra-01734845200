@extends('frontend.layout.layout')
@section('content')
<div class="main-wrapper">
  <div class="error-box">
    <div class="error-logo">
      <!--<a href="{{url('/')}}">-->
      <!--  <img src="{{ asset('uploads/logos/Pathway Driving Training School Header Logo.png')}}" class="img-fluid" alt="Logo">-->
      <!--</a>-->
    </div>
    <h3 class="h2 mb-3"> Oh No! Error 404</h3>
    <p class="h4 font-weight-normal">This page you requested counld not found. May the force be with you!</p>
    <a href="{{url('/')}}" class="btn btn-primary">Back to Home</a>
  </div>
    </div>
@endsection
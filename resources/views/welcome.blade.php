@extends('layouts.app')

@section('content')
  @include('home.welcome-area')
  <!-- include('home.about-area') -->
  @include('home.facts-area')
  @include('home.service-area')
  <!-- include('home.features-area') -->
  <!-- include('home.dinamic-features-area') -->
  @include('home.pricing-area')
  <!-- include('home.portfolio-area') -->
  <!-- include('home.team-area') -->
  <!-- include('home.client-feedback-area') -->
  <!-- include('home.partner-area') -->
  <!-- include('home.news-area') -->
  @include('home.footer-facts-area')
@endsection
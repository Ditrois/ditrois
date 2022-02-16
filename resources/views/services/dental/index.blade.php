@extends('layouts.app')

@section('content')
  @include('services.dental.welcome-area')
  @include('services.dental.about-area')
  <!-- include('services.dental.facts-area') -->
  <!-- include('services.dental.service-area') -->
  <!-- include('services.dental.features-area') -->
  @include('services.dental.pricing-area')
  <!-- include('services.dental.portfolio-area') -->
  <!-- include('services.dental.team-area') -->
  <!-- include('services.dental.client-feedback-area') -->
  <!-- include('services.dental.partner-area') -->
  <!-- include('services.dental.news-area') -->
  @include('services.dental.dinamic-features-area')
  @include('services.dental.footer-facts-area')
@endsection
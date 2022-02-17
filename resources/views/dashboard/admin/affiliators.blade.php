@extends('dashboard.layout.layout')

@section('title', 'Affiliators')

@section('sidebar')
  @include('dashboard.admin.sidebar')
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>@yield('title')</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Affiliator</h4>
              </div>
              <div class="card-body">
                10
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Unpaid Balance</h4>
              </div>
              <div class="card-body">
                42
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4 class="d-inline">Payment Request</h4>
              <div class="card-header-action">
                <a href="#" class="btn btn-primary">View All</a>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled list-unstyled-border">
                <li class="media">
                  <div class="media-body">
                    <div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
                    <h6 class="media-title"><a href="#">Redesign header</a></h6>
                    <div class="text-small text-muted">Alfa Zulkarnain</div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4 class="d-inline">Affiliators</h4>
              <div class="card-header-action">
                <a href="#" class="btn btn-primary">View All</a>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled list-unstyled-border">
                <li class="media">
                  <div class="media-body">
                    <div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
                    <h6 class="media-title"><a href="#">Redesign header</a></h6>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection


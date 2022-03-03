@extends('dashboard.layout.layout')

@section('title', 'Weddings')

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
                    <h4>Total Weddings</h4>
                  </div>
                  <div class="card-body">
                    {{$weddings->count()}}
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
                    <h4>Revenue</h4>
                  </div>
                  <div class="card-body">
                    Rp{{number_format($revenue)}}
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Expired Wedding</h4>
                  </div>
                  <div class="card-body">
                  
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Not Paid</h4>
                  </div>
                  <div class="card-body">
                    Rp{{number_format($unpaid)}}
                  </div>
                </div>
              </div>
            </div>
          </div>


        <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Weddings</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-primary">New Wedding</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>Pembeli</th>
                          <th>Status</th>
                          <th>Tanggal Pernikahan</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($weddings as $wedding)
                        <tr>
                          <td>
                            {{$wedding->transaction->customer_name}}
                            <div class="table-links">
                              in <a href="#">Web Development</a>
                              <div class="bullet"></div>
                              <a href="#">View</a>
                            </div>
                          </td>
                          <td>
                            @if ($wedding->transaction->status == 'pending')
                              <div class="badge badge-warning">Unpaid</div>
                            @elseif ($wedding->transaction->status == 'rejeced')
                              <div class="badge badge-danger">Rejected</div>
                            @elseif ($wedding->transaction->status == 'refund')
                              <div class="badge badge-danger">Refund</div>
                            @else
                              <div class="badge badge-success">Paid</div>
                            @endif
                          </td>
                          <td>{{$wedding->date}}</td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        
        </div>
    </section>
</div>
@endsection

@extends('dashboard.layout.layout')

@section('title', 'Admin Dashboard')

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
                    <h4>Services</h4>
                  </div>
                  <div class="card-body">
                    {{$serviceCount}}
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
                    <h4>Transaction</h4>
                  </div>
                  <div class="card-body">
                    {{$transactions->count()}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Weddings</h4>
                  </div>
                  <div class="card-body">
                  {{$weddingCount}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Affiliators</h4>
                  </div>
                  <div class="card-body">
                    {{$affiliatorCount}}
                  </div>
                </div>
              </div>
            </div>
          </div>


        <div class="row">
        <div class="col-lg-8 col-md-8 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Transaction List</h4>
                  <div class="card-header-action">
                    <a href="/dashboard/admin/transaction/new" class="btn btn-primary">Create Transaction</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                          <td>
                            {{$transaction->customer_name}}
                          </td>
                          <td>
                            @if ($transaction->status == 'pending')
                              <div class="badge badge-warning">Unpaid</div>
                            @elseif ($transaction->status == 'rejeced')
                              <div class="badge badge-danger">Rejected</div>
                            @elseif ($transaction->status == 'refund')
                              <div class="badge badge-danger">Refund</div>
                            @else
                              <div class="badge badge-success">Paid</div>
                            @endif
                          </td>
                          <td>
                            {{$transaction->created_at}}
                          </td>
                          <td>
                            Rp{{number_format($transaction->total)}}
                          </td>
                          <td>
                            @isset($transaction->result_link)
                            <a href="{{$transaction->result_link}}" class="btn btn-success btn-action mr-1">
                                    <i class="fas fa-eye"></i>
                            </a>
                            @endisset
                            <a href="/dashboard/admin/transaction/edit/{{$transaction->id}}" class="btn btn-primary btn-action mr-1">
                                    <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="/dashboard/admin/transaction/delete/{{$transaction->id}}" class="btn btn-danger btn-action" onclick="return confirm ('Hapus transaksi?')">
                                    <i class="fas fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="d-inline">Withdraw Request</h4>
                  <!-- <div class="card-header-action">
                    <a href="#" class="btn btn-primary">View All</a>
                  </div> -->
                </div>
                <div class="card-body">
                  <ul class="list-unstyled list-unstyled-border">
                    @foreach ($affiliatorWithdrawals as $affiliatorWithdrawal)
                    <li class="media">
                      <div class="media-body">
                        
                        <div class="mb-1 float-right">
                        <a href="/dashboard/admin/affiliator/edit/{{$affiliatorWithdrawal->id}}" class="btn btn-success btn-action mr-1" title="Bayar">Bayar</a>
                        </div>
                        <h6 class="media-title">Rp{{number_format($affiliatorWithdrawal->amount)}}</h6>
                        <div class="text-small text-muted">{{$affiliatorWithdrawal->affiliator->user->name}}</div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
        </div>
    </section>
</div>
@endsection

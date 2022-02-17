@extends('dashboard.layout.layout')

@section('title', 'Transaction')

@section('sidebar')
@include('dashboard.affiliator.sidebar')
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
                    <h4>Semua Transaksi</h4>
                  </div>
                  <div class="card-body">
                    {{$transactionCount}}
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
                    <h4>Belum Dibayar</h4>
                  </div>
                  <div class="card-body">
                    {{$unpaidTransactionCount}}
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
                    <h4>Total Komisi</h4>
                  </div>
                  <div class="card-body">
                    Rp{{number_format($transactionSum)}}
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
                    <h4>Peluang Komisi</h4>
                  </div>
                  <div class="card-body">
                    Rp{{number_format($unpaidTransactionSum)}}
                  </div>
                </div>
              </div>
            </div>
          </div>


        <div class="row">
        <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Riwayat Transaksi Afiliate</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                      </tr>
                      @foreach ($transactions as $transaction)
                      <tr>
                        <td>Rp{{number_format($transaction->total)}}</td>
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
                        <td>{{$transaction->created_at}}</td>
                      </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection

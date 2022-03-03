@extends('dashboard.layout.layout')

@section('title', 'All Transactions')

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
        @include('dashboard.alert')

        <div class="section-body">

        <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
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
            </div>
        </div>
    </section>
</div>
@endsection

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

        <div class="section-body">

        <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Latest Posts</h4>
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
                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
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

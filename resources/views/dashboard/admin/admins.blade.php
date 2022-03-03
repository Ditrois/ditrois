@extends('dashboard.layout.layout')

@section('title', 'All Admins')

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
                  <h4>Admins</h4>
                  <div class="card-header-action">
                    <a href="/dashboard/admin/admin/new" class="btn btn-primary">New Admin</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Phone Number</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                          <td>
                            <a href="#" class="font-weight-600"><img src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1"> {{$admin->user->name}}</a>
                          </td>
                          <td>
                            {{$admin->user->phone_number}}
                          </td>
                          <td>
                            <a href="/dashboard/admin/admin/edit/{{$admin->user->id}}" class="btn btn-primary btn-action mr-1">
                                    <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="/dashboard/admin/admin/delete/{{$admin->user->id}}" class="btn btn-danger btn-action" onclick="return confirm ('Hapus admin?')">
                                    <i class="fas fa-trash"></i>
                            </a>
                            <!-- <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a> -->
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
        </div>
    </section>
</div>
@endsection

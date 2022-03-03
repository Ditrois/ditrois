@extends('dashboard.layout.layout')

@section('title', 'All Services')

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
                  <h4>Latest Posts</h4>
                  <div class="card-header-action">
                    <a href="/dashboard/admin/service/new" class="btn btn-primary">New Service</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($services as $service)
                        <tr>
                          <td>
                            {{$service->name}}
                          </td>
                          <td>
                            {{$service->service_category->name}}
                          </td>
                          <td>
                            <a href="https://ditrois.com//{{$service->service_category->slug}}/{{$service->slug}}" class="btn btn-success btn-action mr-1">
                                    <i class="fas fa-eye"></i>
                            </a>
                            <a href="/dashboard/admin/service/edit/{{$service->id}}" class="btn btn-primary btn-action mr-1">
                                    <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="/dashboard/admin/service/delete/{{$service->id}}" class="btn btn-danger btn-action" onclick="return confirm ('Hapus service?')">
                                    <i class="fas fa-trash"></i>
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

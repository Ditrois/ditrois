@extends('dashboard.layout.layout')

@section('title', 'Update Transaction')

@section('sidebar')
@include('dashboard.admin.sidebar')
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <!-- <div class="section-header-back">
              <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div> -->
            <h1>Update Transaction</h1>
            <!-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Post</div>
            </div> -->
          </div>

          <div class="section-body">
            <!-- <h2 class="section-title">Create New Post</h2>
            <p class="section-lead">
              On this page you can create a new post and fill in all fields.
            </p> -->

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div> -->
                  <div class="card-body">
                    
                  {{-- menampilkan error validasi --}}
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                  <form action="/dashboard/admin/transaction/update/{{$transaction->id}}" method="post">
                      @csrf
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="id_service">
                          <option>Pilih Service</option>
                          @foreach ($services as $service)
                            @if ($transaction->id_service == $service->id)
                                <option value="{{$service->id}}" selected>{{$service->name}}</option>
                            @else
                                <option value="{{$service->id}}">{{$service->name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="id_package">
                          <option>Pilih Package</option>
                          @foreach ($packages as $package)
                            @if ($transaction->id_package == $package->id)
                                <option value="{{$package->id}}" selected>{{$package->service->name}} - {{$package->name}}</option>
                            @else
                                <option value="{{$package->id}}">{{$package->service->name}} - {{$package->name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Theme</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="id_theme">
                          <option>Pilih Theme</option>
                          @foreach ($themes as $theme)
                            @if ($transaction->id_theme == $theme->id)
                                <option value="{{$theme->id}}" selected>{{$theme->service->name}} - {{$theme->name}}</option>
                            @else
                                <option value="{{$theme->id}}">{{$theme->service->name}} - {{$theme->name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Customer Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="customer_name" class="form-control" value="{{ $transaction->customer_name }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cutomer Phone Number</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="customer_phone_number" class="form-control" value="{{ $transaction->customer_phone_number }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Result Link</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="result_link" class="form-control" value="{{ $transaction->result_link }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status" id="status">
                          <option value="pending">pending</option>
                          <option value="approved">approved</option>
                          <option value="complete">complete</option>
                          <option value="refund">refund</option>
                          <option value="rejeced">rejected</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Update Transaction</button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <script>
        document.getElementById("status").value = "{{$transaction->status}}";
      </script>
@endsection

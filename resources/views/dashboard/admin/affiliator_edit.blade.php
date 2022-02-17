@extends('dashboard.layout.layout')


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
      <h1>Affiliator's Withdraw Fulfill</h1>
    </div>

    <div class="section-body">
      <!-- <h2 class="section-title">Create New Post</h2>
      <p class="section-lead">
        On this page you can create a new post and fill in all fields.
      </p> -->

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Write Your Post</h4>
            </div>
            <div class="card-body">
              ID Penarikan : {{$withdraw->id}} <br>
              Jumlah : Rp{{number_format($withdraw->amount)}} <br>
              Bank : {{$withdraw->bank}} <br>
              No Rekening : {{$withdraw->no_rekening}} <br>
              Atas Nama : {{$withdraw->nama}} <br>
              Status : {{$withdraw->status}} <br> <br>
              <form action="/dashboard/admin/affiliator/update/{{$withdraw->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Bukti Pembayaran Withdraw</label><br>
                    <input type="file" name="withdraw_proof" accept=".jpeg,.jpg,.png,.gif" onchange="preview_image(event)">					
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-primary">Create Post</button>
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
@endsection


@extends('dashboard.layout.layout')

@section('title', 'Edit Rekening')

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
        <div class="col-md-12"><div class="card">
        <div class="card-header">
          <h4>Update Rekening Penerima</h4>
        </div>
        <div class="card-body">
          <form action="/dashboard/affiliator/payment/update" method="post">
              @csrf
            <div class="form-group row mb-1">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bank</label>
              <div class="col-sm-12 col-md-7">
                <input name="bank" type="text" class="form-control" value="{{$affiliator->bank}}">
                <p>Bisa diisi bank/dompet digital seperti Gopay, Ovo, Dana, Dll</p>
              </div>
            </div>
            <div class="form-group row mb-1">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Rekening</label>
              <div class="col-sm-12 col-md-7">
                <input name="no_rekening" type="text" class="form-control" value="{{$affiliator->no_rekening}}">
                <p>Untuk bank/dompet digital seperti Gopay, Ovo, Dana, dll bisa diisi nomor telepon atau kode user yang bisa digunakan untuk transfer</p>
              </div>
            </div>
            <div class="form-group row mb-1">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Atas Nama</label>
              <div class="col-sm-12 col-md-7">
                <input name="nama" type="text" class="form-control" value="{{$affiliator->nama}}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              </div>
            </div>
          </form>
        </div>
        
        <div class="card-footer bg-whitesmoke">
          <!-- Ketika ada seseorang yang mengakses link yang berisikan kode afilliasimu, kamu akan mendapatkan komisi sebesar 25% dari total transaksi yang orang tersebut lakukan dalam 3 bulan setelah ia pertama kali mengakses link yang berisikan kode affiliasimu. -->
        </div>
      </div>
              
            </div>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection

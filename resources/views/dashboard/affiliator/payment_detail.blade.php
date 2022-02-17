@extends('dashboard.layout.layout')

@section('title', 'Detail Penarikan')

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
      <div class="card">
        <div class="card-body">
          <div class="form-group row mb-1">
            <!-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Affiliate Link</label> -->
            <div class="col-sm-12 col-md-7">
              ID Penarikan : {{$withdraw->id}} <br>
              Jumlah : Rp{{number_format($withdraw->amount)}} <br>
              Bank : {{$withdraw->bank}} <br>
              No Rekening : {{$withdraw->no_rekening}} <br>
              Atas Nama : {{$withdraw->nama}} <br>
              Status : {{$withdraw->status}} <br> <br>
              <img style="overflow: hidden;" class="card-img-top rounded-lg mx-auto d-block" src="/affiliate/withdraw/{{$withdraw->withdraw_proof}}" alt="Belum ada bukti pengiriman saldo yg ditarik, harap tunggu, maksimal 3 hari setelah penarikan dilakukan">
            </div>
          </div>
        </div>
        
        <div class="card-footer bg-whitesmoke"></div>
      </div>
    </div>
  </section>
</div>
@endsection

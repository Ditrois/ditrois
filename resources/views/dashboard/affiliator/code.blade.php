@extends('dashboard.layout.layout')

@section('title', 'Your Code')

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
      <h2 class="section-title">Kode Affiliasi-mu</h2>
      <p class="section-lead">Bagikan kode ini untuk mendapatkan komisi</p>
      <div class="card">
        <div class="card-header">
          <h4>Affiliate Code</h4>
        </div>
        <div class="card-body">
          <div class="form-group row mb-1">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Affiliate Link</label>
            <div class="col-sm-12 col-md-7">
              <input id="myInput" type="text" class="form-control" value="ditrois.com/aff/{{$aff->code}}" disabled>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7 d-flex justify-content-center">
              <button class="btn btn-warning mr-2" onclick="myFunction()">Copy Affiliate Link</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="/dashboard/affiliator/code/update/{{$aff->id}}" method="post">
              @csrf
            <div class="form-group row mb-1">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Affiliate Code</label>
              <div class="col-sm-12 col-md-7">
                <input name="code" type="text" class="form-control" value="{{$aff->code}}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mr-2">Update Affiliate Code</button>
              </div>
            </div>
          </form>
        </div>
        
        <div class="card-footer bg-whitesmoke">
          Ketika ada seseorang yang mengakses link yang berisikan kode afilliasimu, kamu akan mendapatkan komisi sebesar 25% dari total transaksi yang orang tersebut lakukan dalam 3 bulan setelah ia pertama kali mengakses link yang berisikan kode affiliasimu.
        </div>
      </div>
    </div>
  </section>
</div>
<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
}
</script>
@endsection

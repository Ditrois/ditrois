@extends('dashboard.layout.layout')

@section('title', 'Saldo')

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
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Saldo</h4>
                  </div>
                  <div class="card-body">
                    Rp{{number_format($affiliator->saldo)}}
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
        <div class="col-md-12"><div class="card">
        <div class="card-header">
          <h4>Tarik Saldo</h4>
        </div>
        <div class="card-body">
          <form action="/dashboard/affiliator/payment/withdraw" method="post">
              @csrf
            <div class="form-group row">
              <label class="col-form-label text-md-center col-12 col-md-12 col-lg-12">
                INFORMASI PENARIKAN :<br>{{$affiliator->bank}}<br>{{$affiliator->no_rekening}}<br>{{$affiliator->nama}}</label>
            </div>
            <div class="form-group row mb-1">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Penarikan</label>
              <div class="col-sm-12 col-md-7">
                <input name="amount" type="number" class="form-control" value="" required min="25000">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              
              <div class="col-sm-12 col-md-7 d-flex justify-content-center">
                <a href="/dashboard/affiliator/payment/edit" class="btn btn-warning mr-2">Ubah Nomor Rekening</a>
                <button type="submit" class="btn btn-primary mr-2">Tarik</button>
              </div>
            </div>
          </form>
        </div>
        
        <div class="card-footer bg-whitesmoke">
          <!-- Ketika ada seseorang yang mengakses link yang berisikan kode afilliasimu, kamu akan mendapatkan komisi sebesar 25% dari total transaksi yang orang tersebut lakukan dalam 3 bulan setelah ia pertama kali mengakses link yang berisikan kode affiliasimu. -->
        </div>
      </div>
              <div class="card">
                <div class="card-header">
                  <h4>Riwayat Penarikan</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($withdraws as $withdraw)
                      <tr>
                        <td class="font-weight-600">Rp{{number_format($withdraw->amount)}}</td>
                        <td>
                          @if ($withdraw->status == 'pending')
                            <div class="badge badge-warning">Pending</div>
                          @elseif ($withdraw->status == 'rejeced')
                            <div class="badge badge-danger">Rejected</div>
                          @else
                            <div class="badge badge-success">Paid</div>
                          @endif
                        </td>
                        <td>{{$withdraw->created_at}}</td>
                        <td>
                          <a href="/dashboard/affiliator/payment/detail/{{$withdraw->id}}" class="btn btn-primary">Detail</a>
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
        </div>
    </section>
</div>
@endsection

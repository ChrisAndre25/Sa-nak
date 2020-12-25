@extends('layouts.app')
@section('title', "Konfirmasi Pembayaran")

@section('content')
<div class="container">
    <label class="text-primary font-weight-bold xxl-label my-3">Konfirmasi Pembayaran</label>
</div>
<div class="light-blue-bg">
    <div class="container py-4">
        <div class="row">
            <h5 class="font-weight-bold pb-2">Alamat Pengiriman</h5>
        </div>
        <div class="row">
            <div class="col-md">
                <label for="" class="font-weight-bold">{{ Auth()->user()->name }}</label><br>
                <p>{{ Auth()->user()->address }}</p>
                <label for="" class="font-weight-bold">{{ Auth()->user()->phone_number }}</label>
            </div>
            <div class="col-md-4 text-right">
                <div class="row">
                    <label for="" class="font-weight-bold col-md-5 ">Biaya Admin</label> <br>
                    <label for="" class="font-weight-bold text-primary">Rp {{ number_format($totalPrice/10, 0, ',', '.') }}</label>
                </div>
                <div class="row">
                    <label for="" class="font-weight-bold col-md-5 ">Biaya ongkos kirim</label> <br>
                    <label for="" class="font-weight-bold text-primary">Rp 10.000</label>
                </div>
                <div class="row">
                    <label for="" class="font-weight-bold col-md-5 ">Total harga barang</label> <br>
                    <label for="" class="font-weight-bold text-primary">Rp {{ number_format($totalPrice, 0, ',', '.') }}</label>
                </div>
                <hr>
                <div class="row">
                    <label for="" class="font-weight-bold col-md-5 ">Total</label> <br>
                    <label for="" class="font-weight-bold text-primary">Rp {{ number_format($totalPrice+10000+($totalPrice/10), 0, ',', '.') }}</label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header bg-secondary" id="headingOne">
        <a class="text-decoration-none collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <div class="row d-flex align-items-center">
            <div class="col">
                <h5 class="text-white text-left m-0">
                    Transfer Bank
                </h5>
            </div>
            <div class="col">
                <h4 class="text-white text-right m-0">
                    <i class="fas fa-chevron-up"></i>
                </h4>
            </div>
           </div>
        </a>
      </div>
  
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body bg-light">
            <label for="">Catatan : untuk metode pembayaran ini akan dikenakan biaya administrasi sebesar 10% dari jumlah yang
                perlu dibayar.</label>
            <div class="row">
                <div class="col-md mr-4">
                        <div class="form-group">
                            <label for="card-holder-name">Nama pemilik rekening</label>
                            <input type="text" class="form-control" id="card-holder-name">
                        </div>
                        <div class="form-group">
                            <label for="card-num">Nomor rekening</label>
                            <input type="number" class="form-control" id="card-num">
                        </div>
                        <div class="form-group">
                            <label for="bank-name">Nama Bank</label>
                            <select class="custom-select" id="exampleFormControlSelect1">
                                <option selected disabled>Choose...</option>
                                <option>Bank BCA</option>
                                <option>Bank Mandiri</option>
                                <option>Bank CIMB Niaga</option>
                                <option>Bank Permata</option>
                                <option>KEB Hanna Bank</option>
                            </select>
                        </div>
                    <form method="POST" action="{{ action('ProductController@checkOut') }}">
                        @csrf
                        <input type="hidden" name="payment_type" value="Bank">
                        <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                    </form>
                </div>
                <div class="col-md">
                    <div class="card bg.white py-4 ">
                        <ul>
                            <li>
                                <p>Masukan informasi terkait berdasarkan buku tabungan Anda</p>
                            </li>
                            <li>
                                <p>Pastikan bahwa data yang anda masukan telah benar untuk memudahkan proses konfirmasi
                                    pembayaran</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="card">
        <div class="card-header bg-secondary" id="headingTwo">
            <a class="text-decoration-none collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <div class="row d-flex align-items-center">
                  <div class="col">
                      <h5 class="text-white text-left m-0">
                          Cash on Delivery (COD)
                      </h5>
                  </div>
                  <div class="col">
                      <h4 class="text-white text-right m-0">
                          <i class="fas fa-chevron-up"></i>
                      </h4>
                  </div>
                </div>
            </a>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">
            <label for="">Harap baca <a href="" class="">Syarat dan ketentuan</a> sebelum melanjutkan transaksi</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Dengan menekan tombol ini, saya menyatakan telah memahami sepenuhnya mengenai kebijakan tentang
                        pembayaran COD
                    </label>
                </div>
             <form method="POST" action="{{ action('ProductController@checkOut') }}">
                @csrf
                <input type="hidden" name="payment_type" value="COD">
                <button type="submit" class="btn btn-primary my-4">Konfirmasi Pembayaran</button>
            </form>
          </div>
        </div>
    </div>   
</div>
@endsection
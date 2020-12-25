@extends('layouts.app')

@section('title', "Pengembalian Barang Sewa")

@section('content')
<div class="container">
    <label class="text-primary font-weight-bold xxl-label my-3">Pengembalian Barang Sewa</label>
</div>

<div class="light-blue-bg">
    <div class="container py-4">
        <div class="row">
            <h5 class="font-weight-bold pb-2">Alamat Pengiriman</h5>
        </div>
        <div class="row">
            <div class="col-md">
                <label for="" class="font-weight-bold">{{ $detailTransaction->product->user->name }}</label><br>
                <p>{{ $detailTransaction->product->user->address }}</p>
                <label for="" class="font-weight-bold">{{ $detailTransaction->product->user->phone_number }}</label>
            </div>
            <div class="col-md-4 text-right">
                <div class="row">
                    <label for="" class="font-weight-bold col-md-5 ">Biaya ongkos kirim</label> <br>
                    <label for="" class="font-weight-bold text-primary">Rp 10.000</label>
                </div>
                <div class="row">
                    <label for="" class="font-weight-bold col-md-5 ">Total Denda</label> <br>
                    <label for="" class="font-weight-bold text-primary">Rp {{ number_format(($detailTransaction->product->rent_price/10)*floor((strtotime(now()) - strtotime("+".$detailTransaction->duration." month", strtotime($detailTransaction->updated_at)))/60/60/24), 0, ',', '.') }}</label>
                </div>
                <hr>
                <div class="row">
                    <label for="" class="font-weight-bold col-md-5 ">Total</label> <br>
                    <label for="" class="font-weight-bold text-primary">Rp {{ number_format((($detailTransaction->product->rent_price/10)*floor((strtotime(now()) - strtotime("+".$detailTransaction->duration." month", strtotime($detailTransaction->updated_at)))/60/60/24))+10000, 0, ',', '.') }}</label>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container py-4">
    <div class="row">
        <h5 class="font-weight-bold pb-2">Pilih kurir pengiriman</h5>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <select class="custom-select" id="exampleFormControlSelect1">
                    <option>Gosend</option>
                    <option>TIKI</option>
                    <option>JNE</option>
                    <option>J&T</option>
                    <option>Wahana</option>
                </select>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="card">
    <div class="card-header bg-secondary">
    <a class="text-decoration-none">
        <div class="row d-flex align-items-center">
            <div class="col">
                <h5 class="text-white text-left m-0">
                    Transfer Bank
                </h5>
            </div>
        </div>
    </a>
</div>
  
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
                    <a href="{{ route('return', $detailTransaction->id) }}" class="btn btn-primary">Konfirmasi Pembayaran</a>
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
@endsection
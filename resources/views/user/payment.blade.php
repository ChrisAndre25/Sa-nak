@extends('layouts.app')
{{-- @section('title', "$product->name") --}}
@section('title', "Boneka Beruang")

@section('content')
<div class="container">
    <label class="text-primary font-weight-bold xxl-label my-3">Checkout isi keranjang</label>
</div>
<div class="light-blue-bg">
    <div class="container py-4">
        <div class="row">
            <h5 class="font-weight-bold pb-2">Alamat Pengiriman</h5>
        </div>
        <div class="row">
            <div class="col-md">
                <label for="" class="font-weight-bold">Nama</label><br>
                <p>Alamat Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim quas numquam explicabo minima
                    fugit iusto rem ullam laboriosam ad est, voluptates molestiae porro nihil saepe ab iure rerum
                    inventore quasi.</p>
                <label for="" class="font-weight-bold">08123456789</label>
            </div>
            <div class="col-md-4 text-right">
                <div class="row">
                    <label for="" class="font-weight-bold col-md-5 ">Biaya Admin</label> <br>
                    <label for="" class="font-weight-bold text-primary">Rp 10.000,00</label>
                </div>
                <div class="row">
                    <label for="" class="font-weight-bold col-md-5 ">Biaya ongkos kirim</label> <br>
                    <label for="" class="font-weight-bold text-primary">Rp 100.000,00</label>
                </div>
                <div class="row">
                    <label for="" class="font-weight-bold col-md-5 ">Total harga barang</label> <br>
                    <label for="" class="font-weight-bold text-primary">Rp 100.000,00</label>
                </div>
                <hr>
                <div class="row">
                    <label for="" class="font-weight-bold col-md-5 ">Total</label> <br>
                    <label for="" class="font-weight-bold text-primary">Rp 1.000.000,00</label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-secondary border border-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center p-2" onclick="toggleMenu()">
            <h5 class="text-white m-0">Transfer bank</h5>
            <i class="fas fa-chevron-right text-white"></i>
        </div>
    </div>
</div>

<div class="show-hide-menu container p-4">
    <label for="">Catatan : untuk metode pembayaran ini akan dikenakan biaya administrasi sebesar 10% dari jumlah yang
        perlu dibayar.</label>
    <div class="row">
        <div class="col-md mr-4">
            <form method="" action="">
                @csrf
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
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Bank BCA</option>
                        <option>Bank Mandiri</option>
                        <option>Bank CIMB Niaga</option>
                        <option>Bank Permata</option>
                        <option>KEB Hanna Bank</option>
                    </select>
                </div>
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

<div class="bg-secondary border border-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center p-2 ">
            <h5 class="text-white m-0">Cash On Delivery (COD)</h5>
            <i class="fas fa-chevron-right text-white"></i>
        </div>
    </div>
</div>

<div class="show-hide-menu container p-4">
    <label for="">Harap baca <a href="" class="">Syarat dan ketentuan</a> sebelum melanjutkan transaksi</label>
    <form method="" action="">
        @csrf
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Dengan menekan tombol ini, saya menyatakan telah memahami sepenuhnya mengenai kebijakan tentang
                pembayaran COD
            </label>
        </div>
        <button type="submit" class="btn btn-primary my-4">Konfirmasi Pembayaran</button>
    </form>
</div>

@endsection
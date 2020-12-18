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
                <label for="" class="text-primary">Ubah Alamat</label>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container py-4">
    <div class="row">
        <h5 class="font-weight-bold pb-2">Pilih kurir pengiriman</h5>
    </div>
    <div class="row ">
        <div class="col-md">
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Gosend</option>
                    <option>TIKI</option>
                    <option>JNE</option>
                    <option>J&T</option>
                    <option>Wahana</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <label for="" class="font-weight-bold">Biaya ongkos kirim:</label>
        </div>
        <div class="col-md-2">
            <label for="" class="font-weight-bold text-primary">Rp. 10.000,00</label>
        </div>
    </div>
</div>
<hr>
<div class="container py-4">
    <div class="row">
        <div class="col-md">
            <label for="" class="font-weight-bold">Detail produk dibeli</label>
            {{-- @foreach($products as $item) --}}
            <div class="card p-2 m-1">
                <div class="row">
                    <div class="col-md-2">
                        <img height="130em" src="{{asset('img/20201020_213711.jpg')}}" alt="">
                    </div>
                    <div class="col-md offset-md-1">
                        <label for="" class="font-weight-bold"> Boneka Beruang</label><br>
                        <label for="qty">Jumlah : </label> <br>
                        <label for="">Subtotal : Rp 20.000,00</label>
                    </div>
                    <div class="col-md-1">
                        <i class="fas fa-trash-alt fa-lg text-primary"></i>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
            <div class="row">
                <label for="" class="col-md-3">Total item</label> <br>
                <label for="" class="font-weight-bold">3 item</label>
            </div>
            <div class="row">
                <label for="" class="col-md-3">Total Harga</label> <br>
                <label for="" class="font-weight-bold text-primary">Rp 100.000,00</label>
            </div>
        </div>
        <div class="col-md">
            <label for="" class="font-weight-bold">Detail produk disewa</label>
            {{-- @foreach($products as $item) --}}
            <div class="card p-2 m-1">
                <div class="row">
                    <div class="col-md-2">
                        <img height="130em" src="{{asset('img/20201020_213711.jpg')}}" alt="">
                    </div>
                    <div class="col-md offset-md-1">
                        <label for="" class="font-weight-bold"> Boneka Beruang</label><br>
                        <label for="qty">Durasi : </label> 
                        <label for=""> bulan</label><br>
                        <label for="">Subtotal : Rp 20.000,00</label>
                    </div>
                    <div class="col-md-1">
                        <i class="fas fa-trash-alt fa-lg text-primary"></i>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
            <div class="row">
                <label for="" class="col-md-3">Total item</label> <br>
                <label for="" class="font-weight-bold">3 item</label>
            </div>
            <div class="row">
                <label for="" class="col-md-3">Total Harga</label> <br>
                <label for="" class="font-weight-bold text-primary">Rp 100.000,00</label>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <div class="row"></div>
    <div class="col-md offset-md-8">
        <div class="row">
            <label for="" class="font-weight-bold col-md-2 ">Biaya ongkos kirim</label> <br>
            <label for="" class="font-weight-bold text-primary">Rp 100.000,00</label>
        </div>
        <div class="row">
            <label for="" class="font-weight-bold col-md-2 ">Total harga barang</label> <br>
            <label for="" class="font-weight-bold text-primary">Rp 100.000,00</label>
        </div>
        <hr>
        <div class="row">
            <label for="" class="font-weight-bold col-md-2 ">Total yang perlu dibayar</label> <br>
            <label for="" class="font-weight-bold text-primary">Rp 1.000.000,00</label>
        </div>
    </div>
</div>

<div class="container">
    <div class="text-center my-5">
        <a href="" class="btn btn-primary btn-lg">Pilih metode pembayaran</a>
    </div>
</div>
@endsection
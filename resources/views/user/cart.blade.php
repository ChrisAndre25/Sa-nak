@extends('layouts.app')

@section('title', "Isi Keranjang")

@section('content')
<div class="container">
    <label class="text-primary font-weight-bold xxl-label my-3">Checkout isi keranjang</label>
</div>

@if(count($cart) > 0)
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
        <div class="col-md-2">
            <label for="" class="font-weight-bold">Biaya ongkos kirim:</label>
        </div>
        <div class="col-md-2">
            <label for="" class="font-weight-bold text-primary">Rp. 10.000</label>
        </div>
    </div>
</div>
<hr>
<div class="container py-4">
    <div class="row">
        @php
            $purchasedQtyTotal = 0;
            $purchasedPriceTotal = 0;  
        @endphp
        @if(count($cart->where('status', 1)) > 0)
        <div class="col-md">
            <label for="" class="font-weight-bold">Detail produk dibeli</label>
            @foreach($cart as $item)
                @if($item->status == 1)
                @php
                    $purchasedQtyTotal += $item->quantity;
                    $purchasedPriceTotal += $item->quantity*$item->product->sell_price;
                @endphp
                <div class="card p-2 m-1">
                    <div class="row">
                        <div class="col-md-2">
                            <img height="130em" src="storage/products/{{$item->product->image}}" alt="">
                        </div>
                        <div class="col-md offset-md-1">
                            <label for="" class="font-weight-bold">{{$item->product->name}}</label><br>
                            <label for="qty">Jumlah: {{$item->quantity}}</label> <br>
                            <label for="">Subtotal: Rp {{number_format(($item->quantity*$item->product->sell_price), 0, ',', '.')}}</label>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('edit-cart', $item->id) }}" class="btn btn-primary text-white">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>
                        </div>
                        <div class="col-md-1">
                            <form action="{{ action('ProductController@deleteCart', $item->id) }}" method="post" class="d-flex justify-content-end">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger text-white">
                                    <i class="fas fa-trash-alt fa-lg"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            <div class="row">
                <label for="" class="col-md-3">Total item</label> <br>
                <label for="" class="font-weight-bold">{{ $purchasedQtyTotal }} item</label>
            </div>
            <div class="row">
                <label for="" class="col-md-3">Total Harga</label> <br>
                <label for="" class="font-weight-bold text-primary">Rp {{ number_format($purchasedPriceTotal, 0, ',','.') }}</label>
            </div>
        </div>
        @endif
        @php
            $rentQtyTotal = 0;
            $rentPriceTotal = 0;    
        @endphp
        @if(count($cart->where('status', 2)) > 0)
        <div class="col-md">
            <label for="" class="font-weight-bold">Detail produk disewa</label>
            @foreach($cart as $item)
            @if($item->status == 2)
            @php
                $rentQtyTotal += $item->quantity;
                $rentPriceTotal += $item->quantity*$item->product->rent_price*$item->duration;
            @endphp
                <div class="card p-2 m-1">
                    <div class="row">
                        <div class="col-md-2">
                            <img height="130em" src="storage/products/{{$item->product->image}}" alt="">
                        </div>
                        <div class="col-md offset-md-1">
                            <label for="" class="font-weight-bold">{{$item->product->name}}</label><br>
                            <label for="qty">Jumlah: {{$item->quantity}}</label> <br>
                            <label>Durasi: {{ $item->duration }} bulan</label> <br>
                            <label for="">Subtotal: Rp {{number_format(($item->quantity*$item->product->rent_price*$item->duration), 0, ',', '.')}}</label>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <div class="btn-toolbar" role="toolbar">
                                <div class="btn-group mr-2" role="group">
                                    <a type="button" href="{{ route('edit-cart', $item->id) }}" class="btn btn-info text-white m-0" style="height: 38px;">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                </div>
                                <div class="btn-group mr-2" role="group">
                                    <form action="{{ action('ProductController@deleteCart', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger text-white">
                                            <i class="fas fa-trash-alt fa-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            <div class="row">
                <label for="" class="col-md-3">Total item</label> <br>
                <label for="" class="font-weight-bold">{{ $rentQtyTotal }} item</label>
            </div>
            <div class="row">
                <label for="" class="col-md-3">Total Harga</label> <br>
                <label for="" class="font-weight-bold text-primary">Rp {{ number_format($rentPriceTotal, 0, ',', '.') }}</label>
            </div>
        </div>
        @endif
    </div>
</div>
<hr>

<div class="container">
    <div class="row"></div>
    <div class="col-md offset-md-8">
        <div class="row">
            <label for="" class="font-weight-bold col-md-2 ">Biaya ongkos kirim</label> <br>
            <label for="" class="font-weight-bold text-primary">Rp 10.000</label>
        </div>
        <div class="row">
            <label for="" class="font-weight-bold col-md-2 ">Total harga barang</label> <br>
            <label for="" class="font-weight-bold text-primary">Rp {{ number_format($purchasedPriceTotal+$rentPriceTotal, 0, ',', '.') }}</label>
        </div>
        <hr/>
        <div class="row">
            <label for="" class="font-weight-bold col-md-2 ">Total yang perlu dibayar</label> <br>
            <label for="" class="font-weight-bold text-primary">Rp {{ number_format($purchasedPriceTotal+$rentPriceTotal+10000, 0, ',', '.') }}</label>
        </div>
    </div>
</div>

<div class="container">
    <div class="text-center my-5">
        <a href="{{ route('view-payment') }}" class="btn btn-primary btn-lg">Pilih metode pembayaran</a>
    </div>
</div>
@else
<div class="container">
    <div class="text-center">
        <h4>Tidak ada barang di keranjang</h4>
    </div>
</div>
@endif
@endsection
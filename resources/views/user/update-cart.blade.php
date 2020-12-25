@extends('layouts.app')
@php
    $product = $cart->product->name;    
@endphp
@section('title', "$product")

@section('content')
<div class="container py-4">
    <div class="card p-3">
        <div class="row">
            <div class="col-md-4 text-center">
                <img width="300em" src="/storage/products/{{ $cart->product->image }}" alt="">
            </div>
            <div class="col-md-8 px-4">
                <h2 class="text-primary font-weight-bold">{{ $cart->product->name }}</h2>
                <label for="" class="font-weight-bold">Disediakan oleh {{ $cart->product->user->name }}</label> <br>
                <div class="row py-2">
                    <div class="col-md">
                        {{-- RATING --}}
                        @for ($i=0; $i<$cart->product->rating; $i++)
                        <i class="fas fa-star text-warning fa-lg"></i>
                        @endfor
                        @php
                            $productEmpty = 5 - $cart->product->rating;    
                        @endphp
                        @for ($i=0; $i<$productEmpty; $i++)
                        <i class="far fa-star text-warning fa-lg"></i>
                        @endfor
                    </div>
                    <div class="col-md">
                        <label for="">Stok: {{ $cart->product->stock }}</label>
                    </div>
                </div>

                <div class="py-4">
                    <label for="" class="font-weight-bold">Deskripsi Barang</label><br>
                    <p>{{ $cart->product->description }}</p>
                </div>

                <div>
                    <label for="" class="font-weight-bold">Harga Barang</label>
                    <div class="row">
                        @if($cart->status == 1)
                        <div class="col-md">
                            <label for="">Beli : </label>
                            <label for="" class="text-primary font-weight-bold">Rp {{ number_format($cart->product->sell_price, 0, ',', '.') }}</label> <br>
                            <form action="{{ action('ProductController@updateCart', $cart->id) }}" method="post" class="d-flex justify-content-end">
                                @csrf
                                <div class="px-3">
                                    <input type="number" name="quantity" class="form-control" min="1" value="{{ $cart->quantity }}">
                                </div>
                                @method('PUT')
                                <button type="submit" class="btn btn-info text-white px-5">Beli</a>
                            </form>
                        </div>
                        @elseif($cart->status == 2)
                        <div class="col-md">
                                <label for="">Sewa : </label>
                                <label for="" class="text-primary font-weight-bold">Rp {{ number_format($cart->product->rent_price, 0, ',', '.') }}</label> 
                                <label for="">/bulan</label><br>
                            <form action="{{ action('ProductController@updateCart', $cart->id) }}" method="post" class="d-flex justify-content-end">
                                @csrf
                                <div class="px-3">
                                    <input type="number" name="quantity" class="form-control" min="1" value="{{ $cart->quantity }}">
                                </div>
                                @method('PUT')
                                <button type="submit" class="btn btn-primary px-5">Sewa</a>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
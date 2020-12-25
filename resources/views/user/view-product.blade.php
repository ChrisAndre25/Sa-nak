@extends('layouts.app')
@section('title', "$product->name")

@section('content')
<div class="container py-4">
    <div class="card p-3">
        <div class="row">
            <div class="col-md-4 text-center">
                <img width="300em" src="/storage/products/{{ $product->image }}" alt="">
            </div>
            <div class="col-md-8 px-4">
                <h2 class="text-primary font-weight-bold">{{ $product->name }}</h2>
                <label for="" class="font-weight-bold">Disediakan oleh {{ $product->user->name }}</label> <br>
                <div class="row py-2">
                    <div class="col-md">
                        <span> {{ ($overallRating == NULL) ? 0 : $overallRating }}</span>
                        {{-- RATING --}}
                        @for ($i=0; $i<floor($overallRating); $i++)
                        <i class="fas fa-star text-warning fa-lg"></i>
                        @endfor
                        @php
                            $productEmpty = 5 - floor($overallRating);    
                        @endphp
                        @for ($i=0; $i<$productEmpty; $i++)
                        <i class="far fa-star text-warning fa-lg"></i>
                        @endfor
                        <span> ({{ ($countRating == NULL) ? 0 : $countRating }})</span>
                    </div>
                    <div class="col-md">
                        <label for="">Stok: {{ $product->stock }}</label>
                    </div>
                </div>

                <div class="col-md">
                    <label>Rating</label>
                    @if($rating == NULL)
                        <form action="{{ action('HomeController@addRating') }}" method="POST">
                    @else
                        <form action="{{ action('HomeController@updateRating', $rating->id) }}" method="POST">
                    @endif
                    @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="row">
                        <div class="px-3 col-3">
                            <input type="number" name="rating" class="form-control" min="1" max="5" value="1">
                        </div>
                        <div class="col-6">
                            @if($rating != NULL)
                                @method('PUT')
                            @endif
                            <button type="submit" class="btn btn-success text-white px-3">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="py-4">
                    <label for="" class="font-weight-bold">Deskripsi Barang</label><br>
                    <p>{{ $product->description }}</p>
                </div>

                <div>
                    <label for="" class="font-weight-bold">Harga Barang</label>
                    <div class="row">
                        @if($product->sell_price != 0)
                        <div class="col-md">
                            <label for="">Beli : </label>
                            <label for="" class="text-primary font-weight-bold">Rp {{ number_format($product->sell_price, 0, ',', '.') }}</label> <br>
                            <form action="{{ action('ProductController@createCart') }}" method="post" class="d-flex justify-content-end">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="seller_id" value="{{ $product->seller_id }}">
                                <input type="hidden" name="status" value="1">
                                <div class="row">
                                    <div class="form-group px-3 col-3">
                                        <label for="quantity">Jumlah</label>
                                        <input type="number" name="quantity" class="form-control" min="1" value="1">
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <button type="submit" class="btn btn-info text-white px-5">Beli</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                        @if($product->rent_price != 0)
                        <div class="col-md">
                                <label for="">Sewa : </label>
                                <label for="" class="text-primary font-weight-bold">Rp {{ number_format($product->rent_price, 0, ',', '.') }}</label> 
                                <label for="">/bulan</label><br>
                            <form action="{{ action('ProductController@createCart') }}" method="post" class="d-flex justify-content-end">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="seller_id" value="{{ $product->seller_id }}">
                                <input type="hidden" name="status" value="2">
                                <div class="row">
                                    <div class="form-group px-3 col-3">
                                        <label for="quantity">Jumlah</label>
                                        <input type="number" name="quantity" class="form-control" min="1" value="1">
                                    </div>
                                    <div class="form-group px-3 col-3">
                                        <label for="duration">Durasi</label>
                                        <input type="number" name="duration" class="form-control" min="1" max="6" value="1">
                                    </div>
                                    <div class="col-6 d-flex align-items-center">
                                        <button type="submit" class="btn btn-primary px-5">Sewa</button>
                                    </div>
                                </div>
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
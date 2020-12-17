@extends('layouts.app')
{{-- @section('title', "$product->name") --}}
@section('title', "Boneka Beruang")

@section('content')
<div class="container py-4">
    <div class="card p-3">
        <div class="row">
            <div class="col-md-4 text-center">
                {{-- <img width="400em" src="/storage/img/products/{{ $product->image }}" alt=""> --}}
                <img width="300em" src="{{asset('img/20201020_213711.jpg')}}" alt="">
            </div>
            <div class="col-md-8 px-4">
                <h2 class="text-primary font-weight-bold">Boneka Teddy Bear</h2>
                <label for="" class="font-weight-bold">Dijual oleh </label> <br>
                <div class="row py-2">
                    <div class="col-md">
                        {{-- RATING --}}
                        {{-- @foreach ($ratingFill as $star) --}}
                        <i class="fas fa-star text-warning fa-lg"></i>
                        {{-- @endforeach --}}
                        {{-- @foreach ($ratingEmpty as $star) --}}
                        <i class="far fa-star text-warning fa-lg"></i>
                        {{-- @endforeach --}}
                    </div>
                    <div class="col-md">
                        <label for="">Terjual : </label>
                    </div>
                    <div class="col-md">
                        <label for="">Tersewa : </label>
                    </div>
                </div>

                <div class="py-4">
                    <label for="" class="font-weight-bold">Deskripsi Barang</label><br>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore reiciendis sunt iste aliquam non natus doloribus vel? Perspiciatis facere iure, soluta autem, omnis dignissimos, minus corrupti voluptatem iste voluptatum nesciunt.</p>
                </div>

                <div>
                    <label for="" class="font-weight-bold">Harga Barang</label>
                    <div class="row">
                        <div class="col-md">
                            <label for="">Beli : </label>
                            <label for="" class="text-primary font-weight-bold">Rp 20.000,00</label> <br>
                            <a href="" class="btn btn-info text-white px-5 ">Beli</a>
                        </div>
                        <div class="col-md">
                            <label for="">Sewa : </label>
                            <label for="" class="text-primary font-weight-bold">Rp 20.000,00</label> 
                            <label for=""> /bulan</label><br>
                            <a href="" class="btn btn-primary px-5 ">Sewa</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
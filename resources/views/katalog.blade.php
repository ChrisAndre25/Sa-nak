@extends('layouts.app')

@section('title','Katalog')

@section('content')
<div class="light-blue-bg">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-5 my-auto">
                <label class="text-primary font-weight-bold xxl-label my-3">Cari barang kebutuhan anak Anda disini</label>
            </div>
            <div class="col-md text-center">
                <img height="320em" src="{{asset('img/jumbotron-katalog.png')}}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="container py-4">
    @foreach ($categories as $category)
    <div class="row py-2 d-flex justify-content-between">
        <h3 class="font-weight-bold text-primary">{{ $category->name }}</h3>
        <a class="" href="{{ route('view-category', $category->id) }}">Lebih banyak ></a>
    </div>
    <div class="row py-3">
        @foreach($category->product as $item)
        <div class="col-md-3">
            <div class="card mb-2">
                <img height="200em" class="card-img-top"
                    src="/storage/products/{{ $item->image }}"
                    alt="Card image cap">
                <div class="card-body text-center">
                    <h4 class="card-title">{{ $item->name }}</h4>
                    <label class="card-text">Rp {{ number_format(($item->sell_price != 0) ? $item->sell_price : $item->rent_price, 0, ',', '.') }}</label><br>
                    @if($item->sell_price != 0)
                    <a class="btn btn-info text-white" href="{{ route('view-product', $item->id) }}">Beli</a>
                    @endif
                    @if($item->rent_price != 0)
                    <a class="btn btn-outline-primary"  href="{{ route('view-product', $item->id) }}">Sewa</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>

@endsection
@extends('layouts.app')

@section('title',"$category->name")

@section('content')
<div class="container py-4">
    <div class="row py-2 d-flex justify-content-between">
        <h3 class="font-weight-bold text-primary">{{ $category->name }}</h3>
    </div>
    <div class="d-flex flex-wrap">
        @foreach ($category->product as $item)
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
</div>
@endsection
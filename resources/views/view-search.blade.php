@extends('layouts.app')

@section('title',"Search Result")

@section('content')
<div class="container py-4">

    @if(count($products) > 0)
    <div class="d-flex flex-wrap">
        @foreach ($products as $item)
        <div class="col-md-3">
            <div class="card mb-2">
                <img height="200em" class="card-img-top"
                    src="/storage/products/{{ $item->image }}"
                    alt="Card image cap">
                <div class="card-body text-center">
                    <h4 class="card-title">{{ $item->name }}</h4>
                    <label class="card-text">Rp {{ number_format(($item->sell_price != 0) ? $item->sell_price : $item->rent_price, 0, ',', '.') }}</label><br>
                    @if(auth()->user()->role == 'SELLER')
                        <a class="btn btn-info text-white" href="/edit_product/{{$item->id}}">Edit</a>
                        <a class="btn btn-outline-primary"  href="/delete_product/{{$item->id}}">Delete</a>
                    @else
                        @if($item->sell_price != 0)
                        <a class="btn btn-info text-white" href="{{ route('view-product', $item->id) }}">Beli</a>
                        @endif
                        @if($item->rent_price != 0)
                        <a class="btn btn-outline-primary"  href="{{ route('view-product', $item->id) }}">Sewa</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $products->links() }}
    @else
        <div class="text-center">
            <h4>Kata pencarian tidak ditemukan</h4>
        </div>
    @endif
</div>
@endsection
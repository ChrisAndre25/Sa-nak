@extends('layouts.app')

@section('title','Update Product')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card p-3" style="width: 50rem;">
        <div class="title text-center py-3">
            <h4>Update Product</h4>
        </div>
        <form action="{{ action('SellerController@updateProduct', $products->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $products->name }}">
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $products->stock }}">
            </div>
            <div class="form-group">
                <label for="rent_price">Sell Price</label>
                <input type="number" class="form-control" id="sell_price" name="sell_price" value="{{ $products->sell_price }}">
            </div>
            <div class="form-group">
                <label for="rent_price">Rent Price</label>
                <input type="number" class="form-control" id="rent_price" name="rent_price" value="{{ $products->rent_price }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $products->description }}</textarea>
            </div>
            @method('PUT')
            <button type="submit" class="btn btn-primary btn-block my-2">Update Product Data</button>
        </form>
    </div>
</div>
@endsection
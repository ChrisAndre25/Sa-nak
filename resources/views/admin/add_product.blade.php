@extends('layouts.app')

@section('title','Add Product')

@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="card p-3" style="width: 80%">
        <div class="login-form p-4">
            <div class="title text-center py-3">
                <h4>Add New Product</h4>
            </div>
            <form action="{{ action('SellerController@addProduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="ex: Google Notebook" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="custom-select" id="category_id" name="category_id">
                            <option selected disabled>Choose</option>
                            @foreach($categories as $item)
                            <option value="{{ $item->id }}" {{ $item->id == old('category_id') ? 'selected' : ''}}>{{ $item->name }}</option>
                            @endforeach    
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prodstock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="ex: 5" value="{{ old('stock') }}">
                    </div>
                    <div class="form-group">
                        <label for="prodPrice">Sell Price</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp </span>
                            </div>
                            <input type="number" class="form-control" id="sell_price" name="sell_price" value="{{ old('sell_price') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">,00</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prodPrice">Rent Price</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp </span>
                            </div>
                            <input type="number" class="form-control" id="rent_price" name="rent_price" value="{{ old('rent_price') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">,00</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prodDesc">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                            placeholder="ex: color, size, weight" value="{{ old('description') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Browse product image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary my-2 float-right">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
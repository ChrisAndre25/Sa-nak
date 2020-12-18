@extends('layouts.app')

@section('title','Boneka')

@section('content')
<div class="container py-4">
    <div class="row py-2 d-flex justify-content-between">
        <h3 class="font-weight-bold text-primary">Boneka</h3>
    </div>
    <div class="d-flex flex-wrap">
        {{-- @foreach ($products as $item) --}}
        <div class="col-md-3">
            <div class="card mb-2 text-center">
                <div class="card-img-top">
                    <img height="200em" style="max-width:190em;" class="" src="{{asset('img/20201020_213711.jpg')}}" alt="Card image cap">
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">Card title</h4>
                    <label class="card-text">Rp 20.000,00</label><br>
                    <a class="btn btn-info text-white" role="button">Beli</a>
                    <a class="btn btn-outline-primary" role="button">Sewa</a>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
</div>
@endsection
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
    {{-- @foreach ($types as $type) --}}
    <div class="row py-2 d-flex justify-content-between">
        <h3 class="font-weight-bold text-primary">Boneka</h3>
        <a class="" href="#">Lebih banyak ></a>
    </div>
    <div class="row py-3">
        {{-- @foreach($product as $item) --}}
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
        
        {{-- REMOVE BELOW --}}
        <div class="col-md-3">
            <div class="card mb-2">
                <div class="card-img-top">
                    <img height="200em" width="100%" class=""
                    src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                    alt="Card image cap">
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">Card title</h4>
                    <label class="card-text">Rp 20.000,00</label><br>
                    <a class="btn btn-info text-white" role="button">Beli</a>
                    <a class="btn btn-outline-primary" role="button">Sewa</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-2">
                <div class="card-img-top">
                    <img height="200em" width="100%" class=""
                    src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                    alt="Card image cap">
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">Card title</h4>
                    <label class="card-text">Rp 20.000,00</label><br>
                    <a class="btn btn-info text-white" role="button">Beli</a>
                    <a class="btn btn-outline-primary" role="button">Sewa</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-2">
                <div class="card-img-top">
                    <img height="200em" width="100%" class=""
                    src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                    alt="Card image cap">
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">Card title</h4>
                    <label class="card-text">Rp 20.000,00</label><br>
                    <a class="btn btn-info text-white" role="button">Beli</a>
                    <a class="btn btn-outline-primary" role="button">Sewa</a>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
</div>

@endsection
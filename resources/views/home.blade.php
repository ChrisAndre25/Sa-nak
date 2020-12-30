@extends('layouts.app')

@section('title','Homepage')

@section('content')
@if (auth()->user()->role == 'SELLER')
    <div class="container">
        <br><br>
        <h2 class="text text-danger">Welcome Back, {{ Auth::user()->name }} !</h2><br>
        <a href="/add-category"><button type="button" class="btn btn-danger">Add New Category</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="/add-product"><button type="button" class="btn btn-danger">Add New Product</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div><br><br><br>
    <div class="barang-populer py-4 bg-primary">
        <div class="container">
            <div class="d-flex justify-content-between py-2 text-white">
                <h3 class="font-weight-bold">Daftar Barang</h3>
                <!--Controls-->
                <div class="font-weight-bold">
                    <a class="btn" href="#multi-item-example" data-slide="prev">
                        <i class="fas fa-chevron-left fa-lg text-white"></i>
                    </a>
                    <a class="btn" href="#multi-item-example" data-slide="next">
                        <i class="fas fa-chevron-right fa-lg text-white"></i>
                    </a>
                </div>
                <!--/.Controls-->
            </div>
            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
    
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item active">
                        @foreach($firstItems as $item)
                        <div class="col-md-3" style="float:left">
                            <div class="card mb-2">
                                <img height="200em" class="card-img-top"
                                    src="/storage/products/{{ $item->image }}"
                                    alt="Card image cap">
                                <div class="card-body text-center">
                                    <h4 class="card-title">{{ $item->name }}</h4>
                                    <label class="card-text">Rp {{ number_format((($item->sell_price != 0)) ? $item->sell_price : $item->rent_price, 0, ',', '.') }}</label><br>
                                    @if($item->sell_price != 0)
                                    <a class="btn btn-info text-white" href="/edit_product/{{$item->id}}">Edit</a>
                                    @endif
                                    @if($item->rent_price != 0)
                                    <a class="btn btn-outline-primary"  href="/delete_product/{{$item->id}}">Delete</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <!--/.First slide-->
    
                    <!--Second slide-->
                    <div class="carousel-item">
    
                        @foreach($secondItems as $item)
                        <div class="col-md-3" style="float:left">
                            <div class="card mb-2">
                                <img height="200em" class="card-img-top"
                                    src="/storage/products/{{ $item->image }}"
                                    alt="Card image cap">
                                <div class="card-body text-center">
                                    <h4 class="card-title">{{ $item->name }}</h4>
                                    <label class="card-text">Rp {{ number_format(($item->sell_price != 0) ? $item->sell_price : $item->rent_price, 0, ',', '.') }}</label><br>
                                    @if($item->sell_price != 0)
                                    <a class="btn btn-info text-white" href="/edit_product/{{$item->id}}">Edit</a>
                                    @endif
                                    @if($item->rent_price != 0)
                                    <a class="btn btn-outline-primary"  href="/delete_product/{{$item->id}}">Delete</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--/.Second slide-->
                </div>
                <!--/.Slides-->
            </div>
            <!--/.Carousel Wrapper-->
        </div>
    
    </div>
    
@else
<div class="container">
    <div class="row py-4">
        <div class="col-md-6">
            <img width="100%" src="/img/jumbotron-pic.png" class="main-img">
        </div>
        <div class="col-md-6 my-auto">
            <label class="text-primary font-weight-bold xxl-label my-3">Bingung Cari Kebutuhan Anak?</label>
            <p>Disini kamu bisa dengan mudah mencari barang-barang kebutuhan anak baik untuk edukasi atau hiburan. Kamu
                bisa membelinya atau menyewa barang tersebut tanpa khawatir harga yang ditawarkan.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Beli Sekarang</a>
        </div>
    </div>
</div>


<div class="barang-populer py-4 bg-primary">
    <div class="container">
        <div class="d-flex justify-content-between py-2 text-white">
            <h3 class="font-weight-bold">Barang-barang populer</h3>
            <!--Controls-->
            <div class="font-weight-bold">
                <a class="btn" href="#multi-item-example" data-slide="prev">
                    <i class="fas fa-chevron-left fa-lg text-white"></i>
                </a>
                <a class="btn" href="#multi-item-example" data-slide="next">
                    <i class="fas fa-chevron-right fa-lg text-white"></i>
                </a>
            </div>
            <!--/.Controls-->
        </div>
        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                <!--First slide-->
                <div class="carousel-item active">
                    @foreach($firstItems as $item)
                    <div class="col-md-3" style="float:left">
                        <div class="card mb-2">
                            <img height="200em" class="card-img-top"
                                src="/storage/products/{{ $item->image }}"
                                alt="Card image cap">
                            <div class="card-body text-center">
                                <h4 class="card-title">{{ $item->name }}</h4>
                                <label class="card-text">Rp {{ number_format((($item->sell_price != 0)) ? $item->sell_price : $item->rent_price, 0, ',', '.') }}</label><br>
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
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">

                    @foreach($secondItems as $item)
                    <div class="col-md-3" style="float:left">
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
                <!--/.Second slide-->
            </div>
            <!--/.Slides-->
        </div>
        <!--/.Carousel Wrapper-->
    </div>

</div>

<div class="container py-4">
    <div class="row-md py-2">
        <h3 class="font-weight-bold text-primary">Cara mudah membeli barang di Sanak</h3>
    </div>
    <div class="row px-4 py-2">
        <div class="col-md d-flex align-items-stretch py-2">
            <div class="card text-center py-auto">
                <img  src="{{ asset('img/search-pic.png') }}" class="card-img-top" alt="search-pic">
                <div class="card-body">
                    <h5>Cari yang anda mau</h5>
                    <p class="card-text">Cari barang yang Anda mau atau bisa melihat dari katalog kami.</p>
                </div>
            </div>
        </div>
        <div class="col-md d-flex align-items-stretch py-2">
            <div class="card text-center py-auto">
                <img src="{{ asset('img/cart-pic.png') }}" class="card-img-top" alt="add-cart-pic">
                <div class="card-body">
                    <h5>Masukkan ke dalam keranjang</h5>
                    <p class="card-text">Tambahkan semua yang ingin Anda beli/sewa ke dalam keranjang.</p>
                </div>
            </div>
        </div>
        <div class="col-md d-flex align-items-stretch py-2">
            <div class="card text-center py-auto">
                <img src="{{ asset('img/pay-pic.png') }}" class="card-img-top" alt="pay-pic">
                <div class="card-body">
                    <h5>Pembayaran secara online</h5>
                    <p class="card-text">Lakukan pembayaran dengan mudah dan praktis dengan e-money/kartu debit/kartu kredit.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-info">
    <div class="container py-4">
        <div class="row-md py-2">
            <h3 class="font-weight-bold text-white">Mengapa beli/sewa di Sanak</h3>
        </div>
        <div class="row px-4">
            <div class="col-md d-flex align-items-stretch py-2">
                <div class="card text-center py-auto">
                    <div class="card-img-top">
                        <img height="120em" width="120em" src="{{ asset('img/pilihan.png') }}" class="px-auto" alt="search-pic">
                    </div>
                    <div class="card-body">
                        <h5>Banyak pilihan barang</h5>
                        <p class="card-text">Jangan khawatir, di sini kami menyediakan berbagai macam barang untuk memenuhi kebutuhan si kecil.</p>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-items-stretch py-2">
                <div class="card text-center py-auto">
                    <div class="card-img-top">
                        <img height="120em" width="120em" src="{{ asset('img/terjangkau.png') }}" class="" alt="add-cart-pic">
                    </div>
                    <div class="card-body">
                        <h5>Harga terjangkau</h5>
                        <p class="card-text">Disini selain kamu bisa membeli barang baru, kamu juga dapat menyewa nya per bulan loh.</p>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-items-stretch py-2">
                <div class="card text-center py-auto">
                    <div class="card-img-top">
                        <img height="120em" width="120em" src="{{ asset('img/terjamin.png') }}" class="" alt="pay-pic">
                    </div>
                    <div class="card-body">
                        <h5>Barang terjamin</h5>
                        <p class="card-text">Eits, jangan khawatir akan kondisi barangnya. Kami hanya menjual atau menyewakan barang-barang yang aman untuk anak-anak.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
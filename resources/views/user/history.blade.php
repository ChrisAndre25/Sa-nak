@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="container">
    @if(count($histories)<1)
        <h5 class="py-5 text-center white-txt">Tidak terdapat data transaksi</h5>
    @else 
    <div class="card p-3 my-4">
        @foreach ($histories as $history)
        <table class="table table-sm">
            <thead>
                <tr>
                    <th colspan="4" class="table-primary">Tanggal Transaksi: {{ $history->created_at }}</th>
                    @php
                        $totalPrice = 0;
                        foreach($history->detail_transaction as $detail_transaction){
                            $totalPrice += (($detail_transaction->status == 1) ? $detail_transaction->product->sell_price : $detail_transaction->product->rent_price)*$detail_transaction->quantity;
                        }
                    @endphp
                    <th class="table-primary">Total: Rp {{ number_format($totalPrice, 0, ',', '.') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
                @foreach ($history->detail_transaction as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ ($item->status == 1) ? 'Beli' : 'Sewa' }}</td>
                    <td>Rp {{ ($item->status == 1) ? number_format($item->product->sell_price, 0, ',', '.') :  number_format($item->product->rent_price, 0, ',', '.') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ ($item->status == 1) ? number_format($item->product->sell_price*$item->quantity, 0, ',', '.') : number_format($item->product->rent_price*$item->quantity, 0, ',', '.')  }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach 
    </div>
    @endif
    <div class="card p-3 my-4">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th colspan="4" class="table-primary">Barang yang masih disewa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nama</th>
                    <th>Jatuh Tempo</th>
                    <th>Sisa Durasi</th>
                    <th>Harga</th>
                </tr>
                @foreach ($histories as $history)
                    @foreach ($history->detail_transaction->where('status', 2) as $item)
                    @if(strtotime("+".$item->duration." month", strtotime($item->updated_at)) > strtotime($item->updated_at) && floor((strtotime("+".$item->duration." month", strtotime($item->updated_at)) - strtotime(now()))/60/60/24) > 0)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ date('Y-m-d', strtotime("+".$item->duration." month", strtotime($item->updated_at))) }}</td>
                        <td>{{ floor((strtotime("+".$item->duration." month", strtotime($item->updated_at)) - strtotime(now()))/60/60/24) }} hari</td>
                        <td>Rp {{ number_format($item->product->rent_price, 0, ',', '.') }}</td>
                    </tr>
                    @endif
                    @endforeach
                @endforeach 
            </tbody>
        </table>
    </div>
    <div class="card p-3 my-4">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th colspan="4" class="table-primary">Barang yang perlu dikembalikan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nama</th>
                    <th>Jatuh Tempo</th>
                    <th>Total Denda</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($histories as $history)
                    @foreach ($history->detail_transaction->where('status', 2) as $item)
                    @if(strtotime("+".$item->duration." month", strtotime($item->updated_at)) < strtotime(now()))
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ date('Y-m-d', strtotime("+".$item->duration." month", strtotime($item->updated_at))) }}</td>
                        <td>Rp {{ number_format(($item->product->rent_price/10)*floor((strtotime(now()) - strtotime("+".$item->duration." month", strtotime($item->updated_at)))/60/60/24), 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('return-rent', $item->id) }}" class="btn btn-sm btn-success text-white">
                                <i class="fa fa-check fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
@endsection
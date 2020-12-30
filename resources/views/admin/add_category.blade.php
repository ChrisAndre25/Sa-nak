@extends('layouts.app')

@section('title','Add Category')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="card col-md-8 p-3 m-2">
            <form action="{{ action('SellerController@addType') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
                </div>
                <button type="submit" class="btn btn-primary my-2 float-right">Add Category</button>
            </form>

            <div class="title text-center py-3">
                <h4>Product Category List</h4>
            </div> 
            @if(count($categories) < 1)
                <h6 class="py-5">Tidak ada data kategori</h6>
            @else
                <table class="table text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>No.</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="row d-flex justify-content-center">
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <form action="{{ action('SellerController@updateType', $item->id) }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <input type="text" class="form-control mr-1 col-md-9" name="name" id="name" placeholder="Type">
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                                            <form action="{{ action('SellerController@deleteType', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mx-1" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
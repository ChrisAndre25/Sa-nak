@extends('layouts.app')
@section('title','Sanak - Daftar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="banner-img">
            <img height="130em" src="/img/banner.png" class="rounded">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md text-center">
            <img width="85%" src="/img/leftPic.png">
        </div>
        <div class="col-md-5">
            <div class="card mb-2">
                <div class="text-center pt-4">
                    <h4>Daftar</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat E-Mail') }}</label>

                            <div class="col-md">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Nomor HP') }}</label>

                            <div class="col-md">
                                <input id="phone_number" name="phone_number" type="text" class="form-control" value="{{ old('phone_number') }}">
                                <blockquote class="blockquote mb-0">
                                    <footer class="blockquote-footer"><small>Cth. 089612345678</small></footer>
                                </blockquote>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md">
                                <input id="address" name="address" type="text" class="form-control" value="{{ old('address') }}">
                                <blockquote class="blockquote mb-0">
                                    <footer class="blockquote-footer"><small>Cth. Jl. Siaran No. 25, RT 104/RW 08, Jakarta</small></footer>
                                </blockquote>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kata Sandi') }}</label>

                            <div class="col-md">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Kata Sandi') }}</label>

                            <div class="col-md">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

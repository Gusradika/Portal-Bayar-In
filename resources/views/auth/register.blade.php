@extends('layout.template-login')
@section('container')
    <div class="row">
        {{-- Box Kiri --}}
        <div class="col-sm-5 col-12 col-md-4" style="margin-top: 50px;">

            {{-- Header Logo --}}
            <div class="col-12  mt-4">
                <h1 class="fw-bold display-6 text-dark">Portal Bayar In</h1>
                {{-- <img src="asset/img/cbt-b.png" width="400px" class="img-fluid" alt=""> --}}
            </div>
            {{-- Form --}}
            <div class="card px-1 py-4 mt-4">
                <div class="card-body">

                    {{-- Register Customer --}}
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row">
                            {{-- Start Form --}}
                            <div class="col-sm-12 mb-3">
                                <h1>Register {{ $type }}</h1>
                                <span class="text-secondary">Silahkan masukan informasi untuk registrasi.</span>
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <hr>
                                {{-- Hidden Input --}}
                                @if ($type == 'customer')
                                    <input type="hidden" name="type" value="{{ $type }}">
                                @elseif($type == 'tenant')
                                    <input type="hidden" name="type" value="{{ $type }}">
                                @endif
                                {{-- Nama --}}
                                <div class="form-group">
                                    <label for="email">Nama : </label>
                                    <input class="form-control" id="name" type="text" name="name"
                                        placeholder="Masukan email anda..." required>
                                    @error('name')
                                        <div class="text-danger small">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Email --}}
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="password">Email : </label>
                                    <input class="form-control" id="email" type="text" name="email"
                                        placeholder="Masukan Email anda..." required>
                                    @error('email')
                                        <div class="text-danger small">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- No Telp --}}
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="password">No Telp : </label>
                                    <input class="form-control" id="no_telp" type="text" name="no_telp"
                                        placeholder="083130293390" required>
                                    @error('email')
                                        <div class="text-danger small">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Password --}}
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="password">Password (min: 8) : </label>
                                    <input class="form-control" id="password" type="password" name="password"
                                        placeholder="Masukan Password anda..." required>
                                    @error('password')
                                        <div class="text-danger small">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Confirm Password --}}
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="password">Confirm Password (min : 8) : </label>
                                    <input class="form-control" id="confirm-password" type="password"
                                        name="confirm-password" placeholder="Konfirmasi Password anda..." required>
                                    @error('confirm-password')
                                        <div class="text-danger small">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Submit --}}
                        <button class="btn btn-primary w-100 mt-4" type="submit"><i
                                class="fa-solid fa-right-to-bracket fa-flip-vertical"></i> Register</button>
                    </form>


                    {{-- Form Habis --}}
                    <div class="mt-2">
                        <hr>
                        <span class="small text-secondary">Sudah memiliki akun? <a
                                href="{{ route('view-login') }}">Login</a> atau
                            @if ($type == 'customer')
                                <a href="{{ route('view-register', ['type' => 'tenant']) }}"> Register Tenant</a>
                            @else
                                <a href="{{ route('view-register', ['type' => 'customer']) }}"> Register Customer</a>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{-- Box Kanan --}}
        <div class=" col-sm-7 col-md-8 mt-4 col-12 text-center d-none d-sm-block rounded-4">
            <img src="{{ url('asset/images/kopi.png') }}" class="w-100 img-fluid" alt="">
        </div>
    </div>
@endsection

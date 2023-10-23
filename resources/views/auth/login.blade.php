@extends('layout.template-login')
@section('container')
    <div class="row">
        {{-- Box Kiri --}}
        <div class="col-sm-5 col-12 col-md-4" style="margin-top: 50px;">
            <div class="col-sm-7 col-md-8  col-12 text-center d-block d-sm-none">
                <div id="anim2" class="p-4"></div>
            </div>
            {{-- Header Logo --}}
            <div class="col-12  mt-4">
                <h1 class="fw-bold display-6 text-dark">Portal Bayar In</h1>
                {{-- <img src="asset/img/cbt-b.png" width="400px" class="img-fluid" alt=""> --}}
            </div>
            {{-- Form --}}
            <div class="card px-1 py-4 mt-4">
                <div class="card-body">
                    <form action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        <div class="row">
                            {{-- Start Form --}}
                            <div class="col-sm-12 mb-3">
                                <h1>Login</h1>
                                <span class="text-secondary">Silahkan login untuk melanjutkan.</span>
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
                                <div class="form-group">
                                    <label for="email">Email : </label>
                                    <input class="form-control" id="email" type="email" name="email"
                                        placeholder="Masukan email anda..." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-4">
                                <div class="form-group">
                                    <label for="password">Password : </label>
                                    <input class="form-control" id="password" type="password" name="password"
                                        placeholder="Masukan Password anda..." required>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 mt-4" type="submit"><i
                                class="fa-solid fa-right-to-bracket fa-flip-vertical"></i> Login</button>
                    </form>
                    {{-- Form Habis --}}
                    <div class="mt-2">
                        <hr>
                        <span class="small text-secondary">Tidak memiliki akun? <a
                                href="{{ route('view-register', ['type' => 'customer']) }}">Register Customer</a>
                            atau
                            <a href="{{ route('view-register', ['type' => 'tenant']) }}">Register Tenant</a></span>
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

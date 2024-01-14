@extends('layout/template-main')

@section('container')
    <style>

    </style>
    <link rel="stylesheet" href="{{ url('/asset/js/ijaboCropTool.min.css') }}">
    <div class="row p-4">
        <h1>Tambah Menu</h1>
        <hr>
        <div class="col-md-12 col-12">
            <div class="row">
                <form action="{{ route('create-menu') }}" method="POST">
                    @csrf
                    <label for="seatName">Nama Menu</label>
                    <input type="text" class="form-control" id="seatName" name="name">
                    <br>
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga">

                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>

                    <label for="categories">Categories</label>
                    <select name="kategori" id="categories" class="form-control">
                        <option value="1" selected>Makanan</option>
                        <option value="2">Minuman</option>
                    </select>

                    <input type="hidden" name="user_id" value="{{ Auth()->User()->id }}">
                    <button class="mt-4 w-100 btn btn-primary">Save</button>
                </form>
            </div>

        </div>
    </div>
@endsection

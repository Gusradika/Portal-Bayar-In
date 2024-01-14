@extends('layout/template-main')

@section('container')
    <style>

    </style>
    <link rel="stylesheet" href="{{ url('/asset/js/ijaboCropTool.min.css') }}">
    <div class="row p-4">
        <h1>Tambah Menu</h1>
        <hr>
        <div class="col-12">
            <div class="text-center">
                @if ($data['menu']['gambar'] == null)
                    <img src="{{ asset('asset/images/placeholder.jpg') }}"
                        class="rounded-circle mb-4 img-fluid image-previewer" alt="">
                @else
                    <img src="{{ asset('storage/menu-images/' . $data['menu']['gambar']) }}"
                        class="rounded-circle mb-4 img-fluid image-previewer" width="150px" alt="">
                @endif
                <br>
                <h6>Change Image</h6>
                <input type="file" class="custom-file-input d-none" name="file" id="file">
                <label class="btn btn-outline-dark text-center mx-auto mt-4" for="file">Upload
                    Gambar</label>
            </div>
        </div>
        <div class="col-md-12 col-12">
            <div class="row">
                <form action="{{ route('update-menu') }}" method="POST">
                    @csrf
                    <label for="seatName">Nama Menu</label>
                    <input type="text" class="form-control" id="seatName" name="name"
                        value="{{ $data['menu']['name'] }}">
                    <br>
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga"
                        value="{{ $data['menu']['harga'] }}">

                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control">{{ $data['menu']['deskripsi'] }}</textarea>

                    <label for="categories">Categories</label>
                    <select name="kategori" id="categories" class="form-control">
                        <option value="1" @if ($data['menu']['category_id'] == 1) selected @endif>Makanan</option>
                        <option value="2" @if ($data['menu']['category_id'] == 2) selected @endif>Minuman</option>
                    </select>

                    <input type="hidden" name="user_id" value="{{ Auth()->User()->id }}">
                    <input type="hidden" name="menu_id" value="{{ $data['menu']['id'] }}">
                    <button class="mt-4 w-100 btn btn-primary">Save</button>
                </form>
            </div>

        </div>
    </div>

    <script src="{{ url('/asset/js/ijaboCropTool.min.js') }}"></script>
    <script>
        $('#file').ijaboCropTool({
            preview: '.image-previewer',
            setRatio: 1,
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            buttonsText: ['Simpan', 'Batalkan'],
            buttonsColor: ['#30bf7d', '#ee5155', -15],
            processUrl: "{{ route('upload-menu-picture', ['menu_id' => $data['menu']['id']]) }}",
            withCSRF: ['_token', '{{ csrf_token() }}'],
            resetFileInput: false,
            onSuccess: function(message, element, status) {
                alert(message);
                window.location.href = "{{ route('view-menu-tenant') }}";
            },
            onError: function(message, element, status) {
                alert(message);
            }
        });
    </script>
@endsection

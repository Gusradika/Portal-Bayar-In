@extends('layout/template-main')

@section('container')
    <link rel="stylesheet" href="{{ url('/asset/js/ijaboCropTool.min.css') }}">
    <div class="row p-4">
        <h1>Tambah Menu</h1>
        <hr>
        <div class="col-12">

            <div class="text-center">
                <img src="{{ asset('asset/images/placeholder.jpg') }}" class="rounded-circle mb-4 img-fluid image-previewer"
                    alt="">
                <br>
                <h6>Change Image</h6>
                <input type="file" class="custom-file-input d-none" name="file" id="file">
                <label class="btn btn-outline-dark text-center mx-auto mt-4" for="file">Upload
                    Gambar</label>
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
                processUrl: "{{ route('upload-menu-picture', ['menu_id' => $data->id]) }}",
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

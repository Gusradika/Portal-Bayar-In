@extends('layout/template-main')

@section('container')
    <link rel="stylesheet" href="{{ url('/asset/js/ijaboCropTool.min.css') }}">
    <div class="row p-4">
        <h1>Update User</h1>
        <hr>
        <div class="col-md-6 col-12">
            @if ($user->gambar == null)
                <div class="text-center">
                    <img src="{{ asset('asset/images/placeholder.jpg') }}"
                        class="rounded-circle mb-4 img-fluid image-previewer" alt="">
                    <br>
                    <h6>Change Image</h6>
                    <input type="file" class="custom-file-input d-none" name="file" id="file">
                    <label class="btn btn-outline-dark text-center mx-auto mt-4" for="file">Upload
                        Gambar</label>
                </div>
            @else
                <div class="text-center">
                    <img src="{{ asset('storage/user-images/' . $user->gambar) }}"
                        class="rounded-circle mb-4 img-fluid image-previewer" alt="">
                    <br>
                    <h6>Change Image</h6>
                    <input type="file" class="custom-file-input d-none" name="file" id="file">
                    <label class="btn btn-outline-dark text-center mx-auto mt-4" for="file">Upload
                        Gambar</label>
                </div>
            @endif
        </div>
        <div class="col-md-6 col-12">
            <form action="{{ route('update-user') }}" method="post">
                @csrf
                <label class="d-block" id="">ID User</label>
                <div class="input-group mb-3">

                    <input type="text" class="form-control w-100" name="id" placeholder="Username"
                        aria-label="Username" aria-describedby="" readonly value="{{ $user->id }}" required>
                </div>
                <label class="d-block" id="">Nama</label>
                <div class="input-group mb-3">

                    <input type="text" class="form-control" name="name" placeholder="Username" aria-label="Username"
                        aria-describedby="" value="{{ $user->name }}" required>
                    @error('name')
                        <div class="text-danger small">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <label class="d-block" id="">Email</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Username" aria-label="Username"
                        aria-describedby="" value="{{ $user->email }}" required>
                    @error('email')
                        <div class="text-danger small">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <label class="d-block" id="">No Telp</label>
                <div class="input-group mb-3">

                    <input type="text" class="form-control" name="no_telp" placeholder="Username" aria-label="Username"
                        aria-describedby="" value="{{ $user->no_telp }}" required>
                    @error('no_telp')
                        <div class="text-danger small">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <label class="d-block" id="">Created At</label>
                <div class="input-group mb-3">

                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="" readonly value="{{ $user->created_at }}" required>
                </div>
                <button class="btn btn-primary w-100 mt-4" type="submit">Save</button>
            </form>
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
            processUrl: "{{ route('upload-profile-picture', ['id' => $user->id]) }}",
            withCSRF: ['_token', '{{ csrf_token() }}'],
            resetFileInput: false,
            onSuccess: function(message, element, status) {
                alert(message);
            },
            onError: function(message, element, status) {
                alert(message);
            }
        });
    </script>
@endsection

@extends('layout/template-main')

@section('container')
    <div class="row p-4">
        <div class="col-6">

        </div>
        <div class="col-6">
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
@endsection

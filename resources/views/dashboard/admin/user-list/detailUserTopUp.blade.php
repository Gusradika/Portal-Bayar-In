<div class="row">
    <div class="col-5">
        @if ($user->gambar == null)
            <img src="{{ asset('/asset/images/placeholder.jpg') }}" class="img-fluid" alt="">
        @else
            <img src="{{ asset('/storage/user-images/' . $user->gambar) }}" class="img-fluid" alt="">
        @endif
    </div>
    <div class="col-7">
        <label class="d-block" id="">ID User</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby=""
                readonly disabled value="{{ $user->id }}">
        </div>
        <label class="d-block" id="">Nama</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby=""
                readonly disabled value="{{ $user->name }}">
        </div>
        <label class="d-block" id="">Email</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby=""
                readonly disabled value="{{ $user->email }}">
        </div>
        <label class="d-block" id="">No Telp</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby=""
                readonly disabled value="{{ $user->no_telp }}">
        </div>
        <label class="d-block" id="">Created At</label>
        <div class="input-group mb-3">

            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby=""
                readonly disabled value="{{ $user->created_at }}">
        </div>

        <form action="{{ route('add-balance') }}" method="post">
            @csrf
            <label for="">Top Up Amount</label>
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="number" class="form-control mb-2" name="amount">
            <button class="btn btn-primary w-100" type="submit">Simpan</button>
        </form>

    </div>
</div>

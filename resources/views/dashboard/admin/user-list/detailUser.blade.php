<div class="row">
    <div class="col-5">

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

    </div>
</div>

@extends('layout/template-main')

@section('container')
    <!-- Breadcrumb -->
    <div class="col-12 ps-4 pe-4 mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item active" aria-current="page">Data Seat /</li>
                <li class="breadcrumb-item active" aria-current="page">Scan QR</li>
            </ol>
        </nav>
    </div>

    <div class="ps-4 pe-4">
        <!-- Header dan Tombol Aksi -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="fw-bold display-6">Scan QR Code
            </h1>
        </div>
    </div>

    <div class="ps-4 pe-4">
        <!-- Header dan Tombol Aksi -->
        <div class="text-center">
            <h2>Scan QR Code di meja kantin Untuk memulai</h2>
        </div>
    </div>

    <div class="ps-4 pe-4">
        <hr>
        <!-- Header dan Tombol Aksi -->
        <div class="text-center">
            <h2>Debug menu</h2>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close animate-btn-small" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus Seat ini?
                </div>
                <div class="modal-footer">
                    <form action="#" method="post">
                        @csrf
                        <button type="button" class="btn btn-secondary animate-btn-small"
                            data-bs-dismiss="modal">Tutup</button>
                        <input type="hidden" name="idHapus" id="deleteButton" value="">
                        <button type="submit" class="btnHapusModal btn btn-danger animate-btn-small">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Seat -->
    <div class="modal fade" id="modal-view" tabindex="-1" aria-labelledby="modal-view" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-solid fa-book"></i> Mapel Seat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1 ps-4 pe-4">
                        <img src="{{ url('/asset/img/panorama.png') }}" class="w-100 rounded-2 img-fluid" alt="">
                    </div>
                    <div id="modalContent">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary animate-btn-small"
                        data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

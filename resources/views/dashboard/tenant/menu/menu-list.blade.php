@extends('layout/template-main')

@section('container')
    <!-- Breadcrumb -->
    <div class="col-12 ps-4 pe-4 mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item active" aria-current="page">Menu List /</li>
            </ol>
        </nav>
    </div>

    <div class="ps-4 pe-4">
        <!-- Header dan Tombol Aksi -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="fw-bold display-6">Menu List
                <a href="{{ route('view-create-menu') }}"><button class="btn btn-primary animate-btn-small">+
                        Tambah</button>
                </a>
            </h1>
        </div>
    </div>


    <div class="row p-4">
        <div class="col-12 col-lg-6 bg-white rounded-2">
            <div class="mt-4">
                <div class=" p-4">
                    @if (session()->has('delete-success'))
                        <!-- Notifikasi jika data berhasil dihapus -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('delete-success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('import-success'))
                        <!-- Notifikasi jika data berhasil diimpor -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('import-success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('import-error'))
                        <!-- Notifikasi jika terjadi error saat mengimpor data -->
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('import-error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($data['menu']->count() > 0)
                        <div class="w-100">
                            <div id="badge" class="mb-3 d-flex justify-content-between align-items-center">
                                <button class="btn" type="button" id="clearSearch"><span
                                        class="badge p-2 badge-danger animate-btn-small" id="btnClear"></span></button>
                            </div>
                        </div>
                        <div id="tableContent">
                            {{-- Loading --}}
                            <div id="loadingIndicator" class="d-none">
                                <div class="spinner-border" role="status">
                                    <span class="visually-impaired">Loading...</span>
                                </div>
                            </div>
                            <!-- Informasi Jumlah Seat -->
                            Jumlah Seat : {{ count($data['menu']) }}
                            <div class="table-responsive col-12 ">
                                <!-- Tabel Data Seat -->
                                <table id="table" class="table table-striped table-lg ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">gambar</th>
                                            <th scope="col">nama</th>
                                            <th scope="col">Tipe</th>
                                            <th scope="col">harga</th>
                                            <th scope="col">deskripsi</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['menu'] as $key)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($key->gambar == null)
                                                        -
                                                    @else
                                                        <img src="{{ asset('/storage/menu-images/' . $key->gambar) }}"
                                                            alt="" class="img-fluid rounded-circle"
                                                            style="width: 75px">
                                                    @endif
                                                </td>
                                                <td>{{ $key->name }}</td>
                                                <td>
                                                    @if ($key->category_id == 1)
                                                        Makanan
                                                    @else
                                                        Minuman
                                                    @endif
                                                </td>
                                                <td>{{ $key->harga }}</td>
                                                <td>{{ $key->deskripsi }}</td>
                                                <td>
                                                    <!-- Tombol Aksi -->
                                                    <a href="{{ route('view-update-menu', ['id' => $key->id]) }}"
                                                        class="badge bg-secondary p-2 mb-1 animate-btn-small"><i
                                                            class="fa-solid fa-pen-to-square fa-xl"></i>
                                                    </a>
                                                    <a href="#table" class="badge bg-secondary p-2 animate-btn-small">
                                                        <i class="fa-solid fa-xl fa-trash" data-bs-toggle="modal"
                                                            data-bs-target="#deleteConfirmationModal"
                                                            onclick="changeValue('{{ $key->id }}', 'delete');"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $data['menu']->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Pesan jika belum ada data Seat -->
                        <div class="text-center mt-4">
                            <img src="{{ url('/asset/img/not-found.png') }}" alt="" class="img-fluid w-50 "
                                srcset="">
                            <br>
                            <Strong>Data belum ditambahkan</Strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Gambar di sisi kanan (hanya ditampilkan di perangkat desktop) -->
        <div class="col-6 text-center d-none d-lg-block">
            <img src="{{ url('/asset/img/office.png') }}" class="img-fluid w-100" alt="">
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
                    Apakah Anda yakin ingin menghapus Menu ini?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('delete-menu') }}" method="post">
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
                        <img src="{{ url('/asset/img/panorama.png') }}" class="w-100 rounded-2 img-fluid"
                            alt="">
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

    <script>
        function changeValue(itemId) {
            console.log(itemId);
            const deleteButton = document.getElementById('deleteButton');
            deleteButton.setAttribute('value', itemId);
        }
    </script>
@endsection

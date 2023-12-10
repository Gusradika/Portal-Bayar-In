@extends('layout/template-main')

@section('container')
    <div class=" rounded-4 mb-4">
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row  align-items-center g-5 py-5">

                <h1>Analisa dan Laporan</h1>
                {{-- Chart Section --}}
                <div class="col-12 p-4 border border-primary rounded-4">
                    <div class="row">

                        {{-- Ujian Chart --}}
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Transaksi dalam 7 hari</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="ujianChart" style="display: block; width: 558px; height: 320px;"
                                            class="chartjs-render-monitor w-100 "></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h1>Informasi Data</h1>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Jumlah Menu</th>
                            <th>Jumlah Transaksi</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data['list'] as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($item->gambar != null)
                                            <img src="{{ asset('/storage/user-images/' . $item->gambar) }}"
                                                class="img-fluid" alt="" style="width : 50px;">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>
                                        <a href="#table" data-bs-toggle="modal" data-bs-target="#modal-view"
                                            data-Tenantid="{{ $item->id }}"
                                            class="badge bg-info p-2 mb-1 animate-btn-small"
                                            onclick="getData({{ $item->id }})"><i
                                                class="fa-regular fa-eye fa-xl"></i></a>
                                        <a href="{{ route('view-user-update', ['user' => $item->id]) }}"
                                            class="badge bg-secondary p-2 mb-1 animate-btn-small"><i
                                                class="fa-solid fa-pen-to-square fa-xl"></i></a>
                                        <a href="#table" class="badge bg-secondary p-2 animate-btn-small"><i
                                                class="fa-solid fa-xl fa-trash" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmationModal"
                                                onclick="changeValue('{{ $item->id }}', 'delete');"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $data['list']->links('pagination::bootstrap-5') }}
                    </div>
                </div>

                <h1>History Transaksi</h1>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Jumlah Menu</th>
                            <th>Jumlah Transaksi</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data['list'] as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($item->gambar != null)
                                            <img src="{{ asset('/storage/user-images/' . $item->gambar) }}"
                                                class="img-fluid" alt="" style="width : 50px;">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>
                                        <a href="#table" data-bs-toggle="modal" data-bs-target="#modal-view"
                                            data-Tenantid="{{ $item->id }}"
                                            class="badge bg-info p-2 mb-1 animate-btn-small"
                                            onclick="getData({{ $item->id }})"><i
                                                class="fa-regular fa-eye fa-xl"></i></a>
                                        <a href="{{ route('view-user-update', ['user' => $item->id]) }}"
                                            class="badge bg-secondary p-2 mb-1 animate-btn-small"><i
                                                class="fa-solid fa-pen-to-square fa-xl"></i></a>
                                        <a href="#table" class="badge bg-secondary p-2 animate-btn-small"><i
                                                class="fa-solid fa-xl fa-trash" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmationModal"
                                                onclick="changeValue('{{ $item->id }}', 'delete');"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $data['list']->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>


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
                    Apakah Anda yakin ingin menghapus User ini?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('delete-user') }}" method="post">
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

    <!-- Modal -->
    <div class="modal fade" id="modal-view" tabindex="-1" aria-labelledby="modal-view-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-view-label">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- User details will be displayed here -->
                    <div id="user-details"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getData(userId) {
            $.ajax({
                url: "{{ route('view-user-detail') }}", // Replace with your endpoint to fetch user details
                method: 'GET',
                data: {
                    id: userId
                },
                success: function(response) {
                    // Display the user details in the modal
                    $('#user-details').html(response);

                    // Show the modal
                    $('#modal-view').modal('show');
                },
                error: function(error) {
                    console.error('Error fetching user details:', error);
                }
            });
        }

        function changeValue(itemId) {
            console.log(itemId);
            const deleteButton = document.getElementById('deleteButton');
            deleteButton.setAttribute('value', itemId);
        }
    </script>
@endsection

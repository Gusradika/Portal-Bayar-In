@extends('layout/template-main')

@section('container')
    <h1>Dashboard</h1>
    <div class=" rounded-4 mb-4">
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row  align-items-center g-5 py-5">
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
                {{-- Total Siswa --}}
                <div class="text-center row mt-4">
                    <div class="col-lg-4 col-6">
                        <div class="p-4 border border-primary rounded-2">
                            <div class="text-center">
                                <img src="{{ url('/asset/img/student-icon.svg') }}" alt="" class="img-fluid w-50"
                                    srcset="" width="100px" style="max-width: 100px;">
                                <br>
                                <Strong class="fs-5 text-primary d-block">Total User</Strong>
                                <span class="small d-block">Total User</span>
                                <h1 class="display-3 text-primary fw-bold d-block">{{ $userTotal }}</h1>
                            </div>
                        </div>
                    </div>
                    {{-- Total Siswa Unik --}}
                    <div class="col-lg-4  col-6">
                        <div class="p-4 border border-primary rounded-2">
                            <div class="text-center">
                                <img src="{{ url('/asset/img/unique-user.svg') }}" alt="" class="img-fluid w-50"
                                    srcset="" width="100px" style="max-width: 100px;">
                                <br>
                                <Strong class="fs-5 text-primary d-block">Total Tenant</Strong>
                                <span class="small d-block">Total User Tenant</span>
                                <h1 class="display-3 text-primary fw-bold d-block">{{ $tenantTotal }}</h1>
                            </div>
                        </div>
                    </div>
                    {{-- Total mapel --}}
                    <div class="col-lg-4  col-6">
                        <div class="p-4 border border-primary rounded-2">
                            <div class="text-center">
                                <img src="{{ url('/asset/img/kelas-icon.svg') }}" alt="" class="img-fluid w-50"
                                    srcset="" width="100px" style="max-width: 100px;">
                                <br>
                                <Strong class="fs-5 text-primary d-block">Total Seat</Strong>
                                <span class="small d-block">Total Data Seat</span>
                                <h1 class="display-3 text-primary fw-bold d-block">{{ $seatTotal }}</h1>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script>
        var myChart = new Chart(ctxMateri, {
            type: 'line',
            data: {
                labels: labelDates.reverse(),
                datasets: [{
                    label: 'Materi dibuat',
                    data: materiCount.reverse(),
                    borderColor: 'rgba(0, 123, 255, 1)', // Menggunakan warna Bootstrap primary
                    borderWidth: 2
                }]
            },
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0.5,
                        loop: false
                    }
                },
                scales: {
                    y: { // defining min and max so hiding the dataset does not change scale range
                        min: 0,
                        max: 10,
                    }
                }
            }
        });
    </script>
@endsection

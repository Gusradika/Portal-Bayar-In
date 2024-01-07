@extends('layout/template-main')

@section('container')
    <style>

    </style>
    <link rel="stylesheet" href="{{ url('/asset/js/ijaboCropTool.min.css') }}">
    <div class="row p-4">
        <h1>Tambah Seat</h1>
        <hr>
        <div class="col-md-12 col-12">

            <label for="">Nama Seat</label>
            <input type="text" class="form-control" id="seatName" name="name">
            <br>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div id="qrcode"></div>
                </div>
                <input type="hidden" name="data" id="base64Data" value=""> <!-- Data Base64 -->
                <div class="col-lg-8 col-12">
                    <button class="btn btn-primary mt-4" id="generateNow" type="button">Generate Now!</button>
                </div>
                <div class="mt-4">
                    <button class="btn btn-primary w-100" type="button" onclick="runAjax()">Save!</button>
                </div>
            </div>

        </div>
    </div>
    <script src="{{ asset('/asset/js/qrcode.js') }}"></script>
    <script type="text/javascript">
        var qrcode = new QRCode("qrcode");
        // new QRCode(document.getElementById("qrcode"));
        var initialCode = "";
        var route = "localhost:8000/seat/"

        $('#seatName').on('change', function() {
            initialCode = route + $('#seatName').val();
        });

        $('#generateNow').on('click', () => {
            // generate(initialCode);
            // console.log(initialCode);
            qrcode.makeCode(initialCode);
            copyValue();

        })

        function copyValue() {
            var value = $('#qrcode img').attr("src");
            // alert(value);
        }

        function runAjax() {
            $('#base64Data').val($('#qrcode img').attr("src"));
            $.ajax({
                type: "GET",
                url: "{{ route('save-seat') }}", // Ganti dengan URL endpoint Anda
                data: {
                    qr: $('#base64Data').val(),
                    name: $('#seatName').val(),
                },
                success: function(response) {
                    // Lakukan sesuatu dengan respons dari controller jika ada
                    if (response.success == 1) {
                        alert("Success!");
                    } else {
                        alert("error!");
                    }
                },
                error: function(err) {
                    // Tangani kesalahan jika terjadi
                    console.error(err);
                }
            });
        }
    </script>
@endsection

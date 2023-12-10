@extends('layout/template-main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1>Top Up</h1>

    <label for="userEmail">Cari User</label>
    <input type="text" id="userEmail" class="form-control mb-2">
    <button type="button" class="btn btn-primary w-100" id="searchButton">Cari</button>
    <hr>
    <div class="text-center mt-4">
        <div class="p-4 search-container" style="display: none;">
            <div id="user-details"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchButton').click(function() {
                var userEmail = $('#userEmail').val().trim();

                if (userEmail !== '') {
                    getData(userEmail);
                } else {
                    alert('Mohon masukkan alamat email untuk mencari user.');
                }
            });

            function getData(userEmail) {
                $.ajax({
                    url: "{{ route('search-user-email') }}", // Ganti dengan endpoint Anda untuk mengambil detail user
                    method: 'GET',
                    data: {
                        email: userEmail
                    },
                    success: function(response) {
                        if (response.status == 0) {
                            alert('User tidak ditemukan');
                        } else {
                            console.log("found");
                            $('#user-details').html(response);
                            $('.search-container').show();
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching user details:', error);
                    }
                });
            }
        });
    </script>
@endsection

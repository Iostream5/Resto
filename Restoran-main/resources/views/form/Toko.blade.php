<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tefatie Resto</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

</head>

<body>


    <!-- Spinner Start -->
    <!-- Spinner End -->


    <!-- Navbar & Hero End -->

    <!-- About Form Start -->
    <div class="form-container container mt-5">
        <h2 class="text-center">Buat Toko Anda</h2>
        <form action="{{ route('toko.simpan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="fw-bolder my-2">Nama Toko</label>
                <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Masukkan Nama Toko"
                    required>
            </div>

            <div class="mb-3">
                <label class="fw-bolder my-2">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"
                    required></textarea>
            </div>

            <div class="mb-3">
                <label class="fw-bolder my-2">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi"
                    required></textarea>
            </div>

            <div class="mb-3">
                <label class="fw-bolder my-2">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage(event)">
            </div>

            <div class="mb-3">
                <img id="imagePreview" src="#" alt="Preview Foto" style="max-width: 150px; display: none;">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <!-- About Form End -->

    <!-- Footer Start -->
    {{-- Footer --}}
    @include('bagian.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>




    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('template/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('template/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
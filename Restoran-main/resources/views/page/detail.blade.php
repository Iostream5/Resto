<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
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
<style>
    .rounded-5 {
        border-radius: 20px;
    }

    .searching {
        position: relative;
    }

    .form-inputs {
        padding-left: 2.5rem;
        /* Jarak untuk ikon search di kiri */
        padding-right: 2.5rem;
        /* Jarak untuk ikon microphone di kanan */
        height: 55px;
        text-indent: 33px;
        border-radius: 10px;
    }

    .searching .fa-search,
    .searching .fa-microphone {
        color: #6c757d;
        /* Warna ikon, sesuaikan sesuai kebutuhan */
    }

    .form-inputs:focus {

        box-shadow: none;
        border: none;
    }

    .b {
        border-left: 1px solid rgba(141, 141, 141, 0.6);

    }

    .c {
        margin-left: 14px;
    }

    .searching {

        position: relative;
    }

    .searching .fa-search {

        position: absolute;
        top: 20px;
        left: 20px;
        color: #9ca3af;

    }

    .searching span {

        position: absolute;
        right: 17px;
        top: 13px;
        padding: 2px;
        border-left: 1px solid #d1d5db;

    }

    .left-pan {
        padding-left: 7px;
    }

    .left-pan i {

        padding-left: 10px;
    }

    .form-inputs {

        height: 55px;
        text-indent: 33px;
        border-radius: 10px;
    }

    .form-inputs:focus {

        box-shadow: none;
        border: none;
    }

    .ratings i {

        color: #cecece;
    }

    .rating-color {
        color: #fbc634 !important;
    }
</style>

<body style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9))">

    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        @include('bagian.nav')
        <!-- Navbar & Hero End -->
        <div class="container-fluid bg-dark hero-header py-2" style="width: 100%;">
            <div class="container py-3 py-lg-3 my-lg-3">
            </div>
        </div>

        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container-fluid">
                <!-- Komponen Kategori Makanan -->
                <div class="d-flex align-items-center">
                    <div class="mb-4 mb-md-0 me-lg-5">
                        <img class="img-fluid rounded-5" src="{{ asset('storage/'. $produk->foto) }}" alt=""
                            style="width:50rem;">
                    </div>
                    <div class="container">
                        <h5 class="d-flex justify-content-between">
                            <span>{{ $produk->nama }}</span>
                            <span class="text-primary">Rp.{{ $produk->harga }}</span>
                        </h5>
                        <h6 class="d-block border-bottom pb-2 text-muted">{{ $produk->kategori->nama_kategori }}</h6>
                        <!-- Label Makanan di bawah Chicken Burger -->
                        <small class="fst-italic">{{ $produk->deskripsi}}</small>

                        <!-- Komponen Rating -->
                        <div class="d-flex ratings text-nowrap">
                            @php
                            $rating = $produk->rating;
                            @endphp
                            <div class="ratings">
                                @for ($i = 1; $i <= 5; $i++) <i
                                    class="fa fa-star {{ $i <= $rating ? 'rating-color' : '' }}"></i>
                                    @endfor
                            </div>
                            <small class="ms-2 fw-lighther">{{ $produk->rating }}</small>
                        </div>

                        <!-- Tombol Pesan -->
                        <div class="mt-3">
                            <button class="btn btn-success">Pesan</button>
                        </div>
                    </div>
                </div>

                <!-- Komponen Toko seperti Shopee -->
                <div class="mt-4">
                    <div class="border p-3 rounded d-flex align-items-center">
                        <img src="{{ asset('template/img/menu-1.jpg') }}" alt="Logo Toko"
                            style="width: 80px; height: 80px; border-radius: 50%;" class="me-3">
                        <!-- Ganti dengan logo toko -->
                        <div>
                            <h6 class="text-primary">{{ $produk->toko->nama_toko }}</h6>
                            <!-- Ganti "Nama Toko" dengan nama toko yang sebenarnya -->
                            <div class="d-flex ratings text-nowrap">
                                @php
                                $rating = $produk->toko->rating;
                                @endphp
                                <div class="ratings">
                                    @for ($i = 1; $i <= 5; $i++) <i
                                        class="fa fa-star {{ $i <= $rating ? 'rating-color' : '' }}"></i>
                                        @endfor
                                </div>
                                <small class="ms-2 fw-lighther">{{ $produk->toko->rating }}</small>
                            </div>
                            <p>Deskripsi: {{ $produk->toko->deskripsi }}</p>
                            <a href="{{ route('toko.detail', $produk->toko->id) }}"
                                class="btn btn-outline-primary">Kunjungi
                                Toko</a>
                        </div>
                    </div>
                </div>

                <!-- Komponen Komentar Pengguna di bawah informasi toko -->
                <div class="mt-4">
                    <h6>Komentar Pengguna</h6>

                    <!-- Formulir untuk menambah komentar -->
                    <form>
                        <div class="mb-3">
                            <label for="userComment" class="form-label">Komentar</label>
                            <textarea class="form-control" id="userComment" rows="3"
                                placeholder="Tulis komentar Anda di sini"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                    </form>

                    <!-- Contoh Komentar Pengguna -->
                    <div class="mt-3">
                        <div class="border-bottom pb-2 mb-2 d-flex align-items-start">
                            <img src="{{ asset('img/zzi.png') }}" alt="Profil Pengguna"
                                style="width: 40px; height: 40px; border-radius: 50%;" class="me-2">
                            <!-- Ganti dengan gambar profil pengguna -->
                            <div>
                                <strong>Ali Ahmad</strong> <!-- Nama Pengguna -->
                                <p class="mb-1">Burgernya enak banget! Rasa dagingnya sangat juicy dan bumbunya pas.
                                    Pasti pesan lagi!</p>
                                <small class="text-muted">Tanggal: 4 November 2024</small> <!-- Tanggal komentar -->
                            </div>
                        </div>

                        <div class="border-bottom pb-2 mb-2 d-flex align-items-start">
                            <img src="{{ asset('img/zzi.png') }}" alt="Profil Pengguna"
                                style="width: 40px; height: 40px; border-radius: 50%;" class="me-2">
                            <!-- Ganti dengan gambar profil pengguna -->
                            <div>
                                <strong>Siti Nurhaliza</strong> <!-- Nama Pengguna -->
                                <p class="mb-1">Suka banget dengan burger ini! Pengirimannya cepat dan hangat sampai
                                    di rumah.</p>
                                <small class="text-muted">Tanggal: 3 November 2024</small> <!-- Tanggal komentar -->
                            </div>
                        </div>

                        <div class="border-bottom pb-2 mb-2 d-flex align-items-start">
                            <img src="{{ asset('img/zzi.png') }}" alt="Profil Pengguna"
                                style="width: 40px; height: 40px; border-radius: 50%;" class="me-2">
                            <!-- Ganti dengan gambar profil pengguna -->
                            <div>
                                <strong>Rizqi</strong> <!-- Nama Pengguna -->
                                <p class="mb-1">Bagus, tapi saya berharap ada lebih banyak pilihan saus!</p>
                                <small class="text-muted">Tanggal: 2 November 2024</small> <!-- Tanggal komentar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>













        <!-- Menu End -->


        <!-- Footer Start -->
        @include('bagian.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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
    <script src="{{ asset('templatelib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('template/js/main.js') }}"></script>
</body>

</html>
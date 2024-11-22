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
    .ellipsis {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        /* Batasi ke 4 baris */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.5em;
        /* Sesuaikan dengan tinggi baris */
        max-height: calc(1.5em * 4);
        /* Line height * jumlah baris */
    }
</style>

<body style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9))">

    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        @include('bagian.nav')
        <!-- Navbar & Hero End -->
        <div class="container-fluid bg-dark py-2 d-lg-block d-none" style="width: 100%">
            <div class="container py-3 py-lg-3 my-lg-3">
            </div>
        </div>

        <!-- Menu Start -->
        <div class="container-fluid bg-dark hero-header">
            <div class="container pb-3 pb-lg-3 mb-lg-5">
                <div class="overflow-hidden">
                    <div class="row container-fluid">
                        <div class="col-12">
                            <h1 class="text-primary text-center m-0">
                                Selamat Datang di <br>
                                <i class="fa fa-utensils me-3"></i>Restoran!
                            </h1>
                        </div>
                        <div class="col-lg-5">
                            <img class="img-fluid h-auto" src="{{ asset('gambar/3d.png') }}" alt="...">
                        </div>
                        <div class="col-lg-7">
                            <div class="p-4 mb-4 bg-dark text-lg-start text-center rounded-3 shadow-lg">
                                <p class="fw-bold text-light mt-lg-5" style="font-size: 1.2rem; line-height: 1.6;">
                                    Nikmati kemudahan hidup di ujung jari Anda! <span
                                        style="color: #f39c12;">Restoran</span> hadir sebagai
                                    solusi
                                    lengkap untuk memenuhi berbagai kebutuhan harian Anda, mulai dari pemesanan makanan
                                    favorit, belanja di
                                    toko-toko
                                    terdekat, hingga layanan transportasi yang cepat dan aman. Kami menghubungkan Anda
                                    dengan ribuan mitra
                                    berkualitas yang
                                    siap memberikan layanan terbaik.
                                </p>
                                {{-- <p class="fw-bold text -light" style="font-size: 1.2rem; line-height: 1.6;">
                                    Temukan pilihan yang tak terbatas, mulai dari kuliner lokal hingga kebutuhan
                                    sehari-hari. Dengan beberapa kali
                                    sentuhan,
                                    pesan, dan terima langsung di depan pintu Anda. Yuk, coba kemudahan hidup bersama
                                    <span style="color: #f39c12;">Restoran</span> sekarang!
                                </p> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-xxl  py-5">
            <div class="container">
                <div class="text-center wow fadeInUp my-5" data-wow-delay="0.1s">
                    <h1 class="mb-5">Cari Makanan Atau Toko</h1>
                </div>
                <div class="col-12 my-4">
                    <div class="searching">
                        <i class="fa fa-search"></i>
                        <form action="{{ route('produk.search') }}" method="GET">
                            <input type="text" name="search" class="form-control form-inputs"
                                placeholder="Search anything..." value="{{ request()->input('search') }}">
                            <span class="left-pan"><i class="fa fa-microphone"></i></span>
                        </form>
                    </div>
                </div>
                <div class="tab-class wow fadeInUp" data-wow-delay="0.1s">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4 ">
                            @if ($produk->isEmpty())

                            @else

                            <h4 class="fw-bold text-start text-decoration-underline">Makanan</h4>
                            @endif
                            @foreach ($produk as $item)
                            <a href="{{ route('detail', [$item->id, $item->nama]) }}"
                                class="ms-auto col-lg-3 col-md-5 col-6 position-relative">
                                @if (Auth::check() && Auth::user()->favorite->contains('produk_id', $item->id))
                                <form action="{{ route('favorites.hapus', $item->id) }}" method="POST"
                                    class="position-absolute top-0 end-0 m-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-transparent">
                                        <i class="fa fa-heart text-danger fa-2x"></i>
                                    </button>
                                </form>
                                @elseif (Auth::check())
                                <form action="{{ route('favorites.tambah', $item->id) }}" method="POST"
                                    class="position-absolute top-0 end-0 m-1">
                                    @csrf
                                    <button type="submit" class="btn btn-transparent">
                                        <i class="fa fa-heart text-muted fa-2x"></i>
                                    </button>
                                </form>
                                @endif
                                <img src="{{ asset('storage/'. $item->foto) }}" width="100%" class="rounded-5"
                                    alt="...">
                                <div class="card-body">
                                    <p class="text-dark text-start produk fw-bold m-0">{{ $item->nama }}</p>
                                    <small class="text-dark text-start produk fw-lighter">{{ $item->deskripsi }}</small>
                                    <div class="d-flex justify-content-between align-items-center gap-2">
                                        <h6 class="text-primary fw-bold text-nowrap">Rp.{{ $item->harga }}</h6>
                                        <form class="my-3 justify-content-between d-flex"
                                            action="{{ route('cart.tambah', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn p-1 btn-warning btn-lg-sm float-end">
                                                <small class="d-md-block d-none" style="font-size: 10px">
                                                    <span style="font-size: 10px" class="d-md-block d-none text-nowrap">
                                                        Tambah Ke Keranjang </span>
                                                    <i class="bi bi-cart-plus ms-2"></i>
                                                </small>
                                                <i class="d-md-none d-block bi bi-cart-plus"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            <div class="d-flex justify-content-center">
                                {{ $produk->links('pagination::bootstrap-5') }}
                            </div>

                            @if ($toko->isEmpty())
                            @else
                            <h4 class="fw-bold text-start text-decoration-underline">Toko</h4>
                            @endif
                            @foreach ($toko as $item)
                            <a href="{{ route('toko.detail', $item->id) }}" class="col-lg-6 mb-4 text-dark">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid" src="{{ asset('storage/'. $item->foto ) }}"
                                        alt="" style="width: 100px; border-radius:10px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $item->nama_toko }}</span>
                                            <div class="d-flex ratings text-nowrap">
                                                @php
                                                $rating = $item->rating;
                                                @endphp
                                                <div class="ratings">
                                                    @for ($i = 1; $i <= 5; $i++) <i
                                                        class="fa fa-star fs-6 {{ $i <= $rating ? 'rating-color' : '' }}">
                                                        </i>
                                                        @endfor
                                                </div>
                                                <small class="ms-2 fw-lighther">{{ $item->rating }}</small>
                                            </div>
                                        </h5>
                                        <small class="fst-italic ellipsis">{{ $item->deskripsi }}</small>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            <div class="d-flex justify-content-center">
                                {{ $toko->links('pagination::bootstrap-5') }}
                            </div>
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
    <script>
        function searchProducts() {
        var input = document.getElementById('searchInput');
        var filter = input.value.toLowerCase();
        var produkList = document.getElementById('produkList');
        var produkItems = produkList.getElementsByClassName('product-item'); 
        

        for (var i = 0; i < produkItems.length; i++) { var item=produkItems[i]; var
            productName=item.getElementsByTagName('span')[0].textContent.toLowerCase();
            productDescription=item.getElementsByTagName('small')[0].textContent.toLowerCase();
            apakah nama atau deskripsi produk mengandung query pencarian if (productName.indexOf(filter)> -1 ||
            productDescription.indexOf(filter) > -1) {
            item.style.display = "";
            } else {
            item.style.display = "none";
            }
            }
            }
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - TefaTie</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

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
        @include('bagian.nav')
        <div class="container-fluid bg-dark py-2 d-lg-block d-none" style="width: 100%">
            <div class="container py-3 py-lg-3 my-lg-3">
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container-fluid">
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
                        @if (Auth::check() && Auth::user()->favorite->contains('produk_id', $produk->id))
                        <form class="float-end bg-warning" style="border-radius: 15px"
                            action="{{ route('favorites.hapus', $produk->id) }}" method="POST"
                            class="position-absolute top-0 end-0 m-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-transparent">
                                <i class="fa fa-heart text-danger fa-2x"></i>
                            </button>
                        </form>
                        @elseif (Auth::check())
                        <form class="float-end bg-warning" style="border-radius: 15px"
                            action="{{ route('favorites.tambah', $produk->id) }}" method="POST"
                            class="position-absolute top-0 end-0 m-1">
                            @csrf
                            <button type="submit" class="btn btn-transparent">
                                <i class="fa fa-heart text-muted fa-2x"></i>
                            </button>
                        </form>
                        @endif
                        <div class="overflow-auto">
                            <small class="fst-italic">{{ $produk->deskripsi}}</small>
                        </div>

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

                        <div class="mt-3">
                            <form action="{{ route('cart.tambah', $produk->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-warning text-light">Pesan <svg width="20px" height="20px"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        stroke="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M21 5L19 12H7.37671M20 16H8L6 3H3M16 5.5H13.5M13.5 5.5H11M13.5 5.5V8M13.5 5.5V3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                                stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </svg></button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="border p-3 rounded d-flex align-items-center">
                        <img src="{{ asset('storage/'. $produk->toko->foto) }}" alt="Logo Toko"
                            style="width: auto; height: 80px; border-radius:5px;" class="me-3">
                        <div>
                            <h6 class="text-primary">{{ $produk->toko->nama_toko }}</h6>
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
                            <p class="ellipsis">Deskripsi: {{ $produk->toko->deskripsi }}</p>
                            <a href="{{ route('toko.detail', $produk->toko->id) }}"
                                class="btn btn-outline-primary">Kunjungi
                                Toko</a>
                        </div>
                    </div>
                </div>
                <h4 class="fw-bold m-3">Produk Lainnya</h4>
                <div class="row mt-4 col-12">
                    @foreach ($produks as $produks)
                    <a href="{{ route('detail', [$produks->id, $produks->nama]) }}"
                        class="ms-auto col-lg-3 col-md-5 col-6 position-relative">
                        @if (Auth::check() && Auth::user()->favorite->contains('produk_id', $produks->id))
                        <form action="{{ route('favorites.hapus', $produks->id) }}" method="POST"
                            class="position-absolute top-0 end-0 m-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-transparent">
                                <i class="fa fa-heart text-danger fa-2x"></i>
                            </button>
                        </form>
                        @elseif (Auth::check())
                        <form action="{{ route('favorites.tambah', $produks->id) }}" method="POST"
                            class="position-absolute top-0 end-0 m-1">
                            @csrf
                            <button type="submit" class="btn btn-transparent">
                                <i class="fa fa-heart text-muted fa-2x"></i>
                            </button>
                        </form>
                        @endif
                        <img src="{{ asset('storage/'. $produks->foto) }}" width="100%" class="rounded-5" alt="...">
                        <div class="card-body">
                            <p class="text-dark text-start produk fw-bold m-0">{{ $produks->nama }}</p>
                            <small class="text-dark text-start produk fw-lighter ellipsis">{{ $produks->deskripsi
                                }}</small>
                            <div class="d-flex justify-content-between align-items-center gap-2">
                                <h6 class="text-primary fw-bold text-nowrap">Rp.{{ $produks->harga }}</h6>
                                <form class="my-3 justify-content-between d-flex"
                                    action="{{ route('cart.tambah', $produks->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-lg-sm float-end">
                                        <small class="d-md-block d-none" style="font-size: 10px">
                                            Tambah Ke Keranjang<i class="bi bi-cart-plus ms-2"></i>
                                        </small>
                                        <i class="d-md-none d-block bi bi-cart-plus"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        @include('bagian.footer')

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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

    <script src="{{ asset('template/js/main.js') }}"></script>
</body>

</html>
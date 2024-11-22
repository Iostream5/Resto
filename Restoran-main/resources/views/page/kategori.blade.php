<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
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

        <div class="container-xxl  py-5">
            <div class="container">
                <div class="text-center wow fadeInUp my-5" data-wow-delay="0.1s">
                    <h1 class="mb-5">Kategori Makanan: {{ $kategori->nama_kategori }}</h1>
                </div>

                <div class="tab-class wow fadeInUp" data-wow-delay="0.1s">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row mt-4 col-12">
                            @foreach ($kategori->produk as $item)
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
                                    <small class="text-dark text-start produk fw-lighter ellipsis">{{ $item->deskripsi
                                        }}</small>
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
                        </div>
                    </div>
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
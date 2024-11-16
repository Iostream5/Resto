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

<body style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9))">
    <div class="container-xxl bg-white p-0">

        {{-- nav --}}
        @include('bagian.nav')

        <div class="container-fluid bg-dark hero-header py-2" style="width: 100%">
            <div class="container py-3 py-lg-3 my-lg-5">
                <div id="carouselExampleInterval" class="carousel slide p-4" data-bs-ride="carousel">
                    <div class="carousel-inner overflow-hidden">
                        <div class="carousel-item  active" data-bs-interval="1000">
                            <img src="{{ asset('gambar/slider 1.png') }}" class="d-block w-100 rounded-5" alt="...">
                        </div>
                        <div class="carousel-item " data-bs-interval="4000">
                            <img src="{{ asset('gambar/slider 3.png') }}" class="d-block w-100 rounded-5" alt="...">
                        </div>
                        <div class="carousel-item " data-bs-interval="4000">
                            <img src="{{ asset('gambar/slider 4.png') }}" class="d-block w-100 rounded-5" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="py-lg-5 py-2">
            <div class="row pe-0 container-fluid">
                <div class="col-12 mt-3">
                    <h5 class="fw-bolder border-bottom border-3" style="width: 250px">Mau Makan Apa Hari Ini?</h5>
                </div>
                <div class="col-12 mt-3 kategori d-flex container overflow-auto">
                    <div class="mx-lg-2 mx-1 d-flex gap-4">
                        @foreach ($kategori as $item)
                        <a href="{{ route('kategori', $item->id) }}">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2"
                                style="width: 130px; height:50px;">
                                <h6 class="text-light">{{ $item->nama_kategori }}</h6>
                                <img class="" src="{{ asset('storage/'. $item->foto) }}" height="50" alt="">
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 my-4">
                    <div class="searching">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control form-inputs" onclick="menu()"
                            placeholder="Search anything...">
                        <span class="left-pan"><i class="fa fa-microphone"></i></span>
                    </div>
                </div>
                <div class="row mt-4 col-12">
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
                        <img src="{{ asset('storage/'. $item->foto) }}" width="100%" class="rounded-5" alt="...">
                        <div class="card-body">
                            <p class="text-dark text-start produk fw-bold m-0">{{ $item->nama }}</p>
                            <small class="text-dark text-start produk fw-lighter">{{ $item->deskripsi }}</small>
                            <div class="d-flex justify-content-between align-items-center gap-2">
                                <h6 class="text-primary fw-bold text-nowrap">Rp.{{ $item->harga }}</h6>
                                <form class="my-3 justify-content-between d-flex"
                                    action="{{ route('cart.tambah', $item->id) }}" method="POST">
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
                    <div class="d-flex justify-content-center">
                        {{ $produk->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container-fluid row">
                <div class="col-12">
                    <h5 class="fw-bolder border-bottom border-3" style="width: 150px">Cari di Toko</h5>
                </div>
                <div class="row col-12 g-4">
                    @foreach ($toko as $item)
                    <div class="d-flex align-items-center col-lg-6 mb-4">
                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'. $item->foto ) }}" alt=""
                            style="width: 100px;">
                        <div class="w-100 d-flex flex-column text-start ps-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                    <span>{{ $item->nama_toko }}</span>
                                </h5>
                                <a href="{{ route('toko.detail', $item->id) }}"
                                    class="btn btn-sm btn-primary">Kunjungi</a>
                            </div>

                            <small class="fst-italic">{{ $item->deskripsi }}</small>
                        </div>
                    </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {{ $toko->links('pagination::bootstrap-5') }}
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
    <script src="{{ asset('template/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
        function menu() {
            window.location = "{{ route('search') }}"
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.favorite-btn').on('click', function() {
                var productId = $(this).data('product-id');
                var isFavorited = $(this).data('is-favorited') === '1';
    
                var url = isFavorited ? '/product/' + productId + '/unfavorite' : '/product/' + productId + '/favorite';
                var newIconClass = isFavorited ? 'fa-heart-o' : 'fa-heart';
                var newIsFavorited = isFavorited ? '0' : '1';
    
                // Kirim request AJAX untuk mengubah status favorit
                $.post(url, function(response) {
                    // Update tombol favorit
                    $('#product-' + productId + ' .favorite-btn')
                        .data('is-favorited', newIsFavorited)
                        .find('i')
                        .removeClass('fa-heart fa-heart-o')
                        .addClass(newIconClass);
                });
            });
        });
    </script>
    <script src="{{ asset('template/js/main.js') }}"></script>
</body>

</html>
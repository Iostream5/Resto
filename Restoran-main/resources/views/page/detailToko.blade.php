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

        <div class="container-fluid bg-dark py-2 d-lg-block d-none" style="width: 100%">
            <div class="container py-3 py-lg-3 my-lg-3">
            </div>
        </div>


        <div class="py-lg-5 py-2">
            <div class="row pe-0 container-fluid">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="">
                                <div class="profile-img-wrapper">
                                    <img src="{{ asset('storage/'.$toko->foto) }}" class="profile-img" alt="Profil">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <h2>Informasi Toko</h2>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Nama Toko: <span id="name">{{ $toko->nama_toko }}</span>


                                </li>
                                <li class="list-group-item">
                                    Email: <span id="email">rahawaih.com</span>

                                </li>
                                <li class="list-group-item">
                                    Telepon: <span id="telepon">+62 899 9999 9999</span>
                                </li>
                                <li class="list-group-item">
                                    Alamat: <span id="alamat">{{ $toko->alamat }}</span>

                                </li>
                                <li class="list-group-item">
                                    Quality: <span id="alamat">Best Quality</span>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h4 class="mt-5 mx-5">Produk Dari Toko {{ $toko->nama_toko }}</h4>
                <div class="row mt-4 col-12">
                    @foreach ($toko->produk as $item)
                    <a href="{{ route('detail', $item->id) }}" class="ms-auto col-lg-3 col-md-5 col-6">
                        <img src="{{ asset('storage/'. $item->foto) }}" class="card-img-top rounded-5" alt="...">
                        <div class="card-body">
                            <p class="text-dark text-start produk fw-bold m-0">{{ $item->nama}}</p>
                            <small class="text-dark text-start produk fw-lighter">{{ $item->deskripsi}}</small>
                            <h5 class="text-primary fw-bold text-nowrap">Rp.{{ $item->harga }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="ratings text-nowrap">
                                    @php
                                    $rating = $item->rating;
                                    @endphp
                                    <div class="ratings">
                                        @for ($i = 1; $i <= 5; $i++) <i
                                            class="fa fa-star {{ $i <= $rating ? 'rating-color' : '' }}"></i>
                                            @endfor
                                    </div>
                                    <h5 class="review-count">12 Reviews</h5>
                                </div>
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

        function toggleVisibility(id, fullText) {
            const element = document.getElementById(id);
            if (element.textContent.includes('*')) {
                element.textContent = fullText;
            } else {
                element.textContent = element.textContent.replace(/[^\s@]/g, '*');
            }
        }
    </script>

    <script src="{{ asset('template/js/main.js') }}"></script>
</body>

</html>
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

</style>

<body style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9))">

    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        @include('bagian.nav')
        <!-- Navbar & Hero End -->
        <div class="container-fluid bg-dark hero-header py-2" style="width: 100%">
            <div class="container py-3 py-lg-3 my-lg-3">
            </div>
        </div>

        <!-- Menu Start -->
        <div class="container-xxl  py-5">
            <div class="container">
                <div class="text-center wow fadeInUp my-5" data-wow-delay="0.1s">
                    <h1 class="mb-5">Kategori Makanan: {{ $kategori->nama_kategori }}</h1>
                </div>

                <div class="tab-class wow fadeInUp" data-wow-delay="0.1s">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row mt-4 col-12">
                            @foreach ($kategori->produk as $item)
                            <a href="{{ route('detail', $item->id) }}" class="ms-auto col-lg-3 col-md-5 col-6">
                                <img src="{{ asset('storage/'. $item->foto) }}" class="card-img-top rounded-5"
                                    alt="...">
                                <div class="card-body">
                                    <p class="text-dark text-start produk fw-bold m-0">{{ $item->nama }}</p>
                                    <small class="text-dark text-start produk fw-lighter mb-5">{{
                                        $item->deskripsi}}</small>
                                    <h5 class="text-primary fw-bold text-nowrap">Rp.{{ $item->harga }}</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="ratings text-nowrap">
                                            @php
                                            $rating = $item->rating;
                                            @endphp
                                            <div class="ratings">
                                                @for ($i = 1; $i <= 5; $i++) <i
                                                    class="fa fa-star {{ $i <= $rating ? 'rating-color' : '' }}">
                                                    </i>
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
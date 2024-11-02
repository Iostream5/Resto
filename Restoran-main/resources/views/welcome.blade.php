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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('template/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
</head>
<style>
    .kategori::-webkit-scrollbar { 
    display: none;
    }
    

    .rounded-5{
        border-radius: 15px
    }
    .ratings i{
    
    color:#cecece;
    }
    
    .rating-color{
    color:#fbc634 !important;
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

</style>

<body style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9))">
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0 mb-lg-4">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                
                {{-- nav --}}
                @include('bagian.nav')

            </nav>

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
        <!-- Navbar & Hero End -->


        <!-- menu Start -->
       <div class="py-lg-5 py-2">
            <div class="row pe-0 container-fluid">
                <div class="col-12 mt-3">
                    <h5 class="fw-bolder border-bottom border-3" style="width: 250px">Mau Makan Apa Hari Ini?</h5>
                </div>
                <div class="col-12 mt-3 kategori d-flex container overflow-auto">
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="mx-lg-2 mx-1">
                        <a href="#">
                            <div class="bg-dark rounded-pill d-flex align-items-center p-2" style="width: 130px; height:50px;">
                                <h6 class="text-light">Cemilan</h6>
                                <img class="" src="{{ asset('gambar/burjer.png') }}" height="50" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 my-4">
                    <div class="searching">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control form-inputs" onclick="menu()" placeholder="Search anything...">
                        <span class="left-pan"><i class="fa fa-microphone"></i></span>
                    </div>
                </div>
                <div class="row mt-4 col-12">
                    <a href="#" class="ms-auto col-lg-3 col-md-5 col-6">
                        <img src="{{ asset('gambar/produk.png') }}" class="card-img-top rounded-5" alt="...">
                        <div class="card-body">
                            <p class="text-dark text-start produk card-text fw-bold">Chicken Burger by Hangry - Cikini.</p>
                            <h5 class="text-primary fw-bold text-nowrap">Rp.1.000.000</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="ratings text-nowrap">
                                    @php
                                    $rating = 4;
                                    @endphp
                                    <div class="ratings">
                                        @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star {{ $i <= $rating ? 'rating-color' : '' }}"></i>
                                            @endfor
                                    </div>
                                    <h5 class="review-count">12 Reviews</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="ms-auto col-lg-3 col-md-5 col-6">
                        <img src="{{ asset('gambar/produk.png') }}" class="card-img-top rounded-5" alt="...">
                        <div class="card-body">
                            <p class="text-dark text-start produk card-text fw-bold">Chicken Burger by Hangry - Cikini.</p>
                            <h5 class="text-primary fw-bold text-nowrap">Rp.1.000.000</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="ratings text-nowrap">
                                    @php
                                    $rating = 4;
                                    @endphp
                                    <div class="ratings">
                                        @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star {{ $i <= $rating ? 'rating-color' : '' }}"></i>
                                            @endfor
                                    </div>
                                    <h5 class="review-count">12 Reviews</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="ms-auto col-lg-3 col-md-5 col-6">
                        <img src="{{ asset('gambar/produk.png') }}" class="card-img-top rounded-5" alt="...">
                        <div class="card-body">
                            <p class="text-dark text-start produk card-text fw-bold">Chicken Burger by Hangry - Cikini.</p>
                            <h5 class="text-primary fw-bold text-nowrap">Rp.1.000.000</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="ratings text-nowrap">
                                    @php
                                    $rating = 4;
                                    @endphp
                                    <div class="ratings">
                                        @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star {{ $i <= $rating ? 'rating-color' : '' }}"></i>
                                            @endfor
                                    </div>
                                    <h5 class="review-count">12 Reviews</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="ms-auto col-lg-3 col-md-5 col-6">
                        <img src="{{ asset('gambar/produk.png') }}" class="card-img-top rounded-5" alt="...">
                        <div class="card-body">
                            <p class="text-dark text-start produk card-text fw-bold">Chicken Burger by Hangry - Cikini.</p>
                            <h5 class="text-primary fw-bold text-nowrap">Rp.1.000.000</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="ratings text-nowrap">
                                    @php
                                    $rating = 4;
                                    @endphp
                                    <div class="ratings">
                                        @for ($i = 1; $i <= 5; $i++) <i class="fa fa-star {{ $i <= $rating ? 'rating-color' : '' }}"></i>
                                            @endfor
                                    </div>
                                    <h5 class="review-count">12 Reviews</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- menu End -->


        <!-- Toko Start -->
        <div class="container-xxl py-5">
            <div class="container-fluid row">
                <div class="col-12">
                    <h5 class="fw-bolder border-bottom border-3" style="width: 150px">Cari di Resto</h5>
                </div>
                <div class="row col-12 g-4">
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid rounded" src="img/menu-1.jpg" alt="" style="width: 80px;">
                            <div class="w-100 d-flex flex-column text-start ps-4">
                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                    <span>Warung Kholiq</span>
                                    <a href="#" class="btn btn-sm btn-primary">Kunjungi</a>
                                </h5>
                                <small class="fst-italic">Masakan Padang, Aneka Nasi, Ayam</small>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Testimonial Start -->
        {{-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                    <h1 class="mb-5">Our Clients Say!!!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Testimonial End -->
        

        <!-- Footer Start -->
        @include('bagian.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('template/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('template/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('template/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('template/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('template/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('template/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('template/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script>
        function menu(){
            window.location="{{ route('search') }}"
        }
    </script>

    <!-- Template Javascript -->
    <script src="{{ asset('template/js/main.js') }}"></script>
</body>

</html>
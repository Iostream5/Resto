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
                    <h1 class="mb-5">Category!</h1>
                </div>
                
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('template/img/menu-1.jpg') }}" alt=""
                                        style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>
                                            <span class="text-primary">$115</span>
                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('template/img/menu-2.jpg') }}" alt=""
                                        style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>
                                            <span class="text-primary">$115</span>
                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('template/img/menu-3.jpg') }}" alt=""
                                        style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>
                                            <span class="text-primary">$115</span>
                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('template/img/menu-4.jpg') }}" alt=""
                                        style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>
                                            <span class="text-primary">$115</span>
                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('template/img/menu-5.jpg') }}" alt=""
                                        style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>
                                            <span class="text-primary">$115</span>
                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('template/img/menu-6.jpg') }}" alt=""
                                        style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>
                                            <span class="text-primary">$115</span>
                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('template/img/menu-7.jpg') }}" alt=""
                                        style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>
                                            <span class="text-primary">$115</span>
                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{ asset('template/img/menu-8.jpg') }}" alt=""
                                        style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>
                                            <span class="text-primary">$115</span>
                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
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
</body>

</html>
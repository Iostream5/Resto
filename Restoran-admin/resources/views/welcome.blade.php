<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('template/src/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('template/src/assets/css/styles.min.css') }}" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="{{ asset('Logo-Altie.png') }}" width="250" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>

                @include('bagian.nav')

            </div>
        </aside>
        <div class="body-wrapper">

            @include('bagian.header')

            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Global Kategori </h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Total</h6>
                                <h1 class="">
                                    @php
                                    $totalKategori = $kategori->where('user_id', Auth::id())->count();
                                    echo $totalKategori;
                                    @endphp
                                </h1>
                                <a href="{{ route('kategori.tampil') }}" class="card-link">Lihat Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Global Toko </h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Total</h6>
                                <h1 class="">
                                    @php
                                    $totalToko = $toko->where('user_id', Auth::id())->count();
                                    echo $totalToko;
                                    @endphp
                                </h1>
                                <a href="{{ route('toko.tampil') }}" class="card-link">Lihat Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Global Produk </h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Total</h6>
                                <h1 class="">
                                    @php
                                    $totalProduk = $produk->where('toko.user_id', Auth::id())->count();
                                    echo $totalProduk;
                                    @endphp
                                </h1>
                                <a href="{{ route('produk.tampil') }}" class="card-link">Lihat Data</a>
                            </div>
                        </div>
                    </div>
                </div>






                @include('bagian.footer')

            </div>
        </div>
    </div>
    <script src="{{asset('template/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('template/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/src/assets/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('template/src/assets/js/app.min.js')}}"></script>
    <script src="{{asset('template/src/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{asset('template/src/assets/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="{{asset('template/src/assets/js/dashboard.js')}}"></script>
</body>

</html>
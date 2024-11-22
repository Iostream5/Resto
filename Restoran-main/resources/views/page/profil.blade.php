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
    .kategori::-webkit-scrollbar {
        display: none;
    }


    .rounded-5 {
        border-radius: 15px
    }

    .ratings i {

        color: #cecece;
    }

    .rating-color {
        color: #fbc634 !important;
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

    .profile-card {
        border-radius: 50%;
        overflow: hidden;
        width: 300px;
        height: 300px;
        margin: auto;
        position: relative;
    }

    .profile-img-wrapper {
        width: 100%;
        height: auto;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto;
    }

    .profile-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .username {
        text-align: center;
        font-weight: bold;
        margin-top: 10px;
    }

    .red-heart path {
        fill: #FF4545;
    }

    .list-group {
        padding: 0;
        margin: 0;
        list-style-type: none;
    }

    .list-group-item {
        background-color: transparent;
        border: none;
        padding: 8px 0;
    }

    .list-group-item button {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
    }

    .list-group-item svg {
        fill: black;
        transition: fill 0.3s ease;
    }

    .list-group-item button:focus svg path:nth-child(2) {
        fill: black;
        color: black
    }

    .list-group-item button:focus {
        outline: none;
    }

    @media (max-width: 360px) {
        .nav-item {
            width: 50%;
        }


    }


    .toko-section {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 1;
    }
</style>
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

        {{-- nav --}}
        @include('bagian.nav')

        <div class="container-fluid bg-dark py-2 d-lg-block d-none" style="width: 100%">
            <div class="container py-3 py-lg-3 my-lg-3">
            </div>
        </div>

        <!-- menu Start -->
        <div class="py-lg-5 py-2">
            <div class="row pe-0 container-fluid">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="card profile-card">
                                <div class="profile-img-wrapper">
                                    @if (Auth::user()->profile_photo_path)
                                    <img src="{{ asset('storage/'. Auth::user()->profile_photo_path) }}"
                                        class="profile-img" alt="Profil">
                                    @else
                                    <img src="https://via.placeholder.com/300" class="profile-img" alt="Profil">
                                    @endif
                                </div>
                            </div>
                            <p class="username">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="card-text">
                                @if (Auth::user()->bio)
                                {{ Auth::user()->bio }}
                                @else
                                Kamu Belum Menambahkan Biodata
                                @endif
                            </p>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-primary">Edit
                                    Profil</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Log Out</button>
                                </form>
                            </div>

                        </div>
                        <div class="col-md-4 mt-4">
                            <h2>Informasi Pengguna</h2>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Email:
                                    @if (Auth::user()->email)
                                    <small class="fw-bold" id="email">****@****.com</small class="fw-bold">
                                    <button onclick="toggleVisibility('email', '{{ Auth::user()->email }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </button>
                                    @else
                                    <small class="fw-bold" id="email">Tambahkan Email Anda</small class="fw-bold">
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    Telepon:
                                    @if (Auth::user()->telepon)
                                    <small class="fw-bold" id="telepon">(***) ***-****</small class="fw-bold">
                                    <button onclick="toggleVisibility('telepon', '{{ Auth::user()->telepon }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </button>
                                    @else
                                    <small class="fw-bold" id="telepon"><i>Tambahkan Nomor Telepon Anda</i></small>
                                    @endif

                                </li>
                            </ul>

                            @if (Auth::user())
                            <h3 class="mt-4">Lainnya</h3>



                            <div class="d-flex my-5 text-center ">
                                <div class="container">
                                    <a href="{{ route('keranjang', Auth::user()->$keranjang) }}"
                                        class="btn text-center btn-info"><svg height="30" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </a>
                                    <h6>Keranjang</h6>
                                </div>
                                <div class="container">
                                    <a href="{{ route('transaksi', Auth::user()) }}" class="btn btn-success">
                                        <svg viewBox="0 0 24 24" height="30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C21.672 6.01511 21.9082 7.22882 21.9743 9.25H2.02572C2.09185 7.22882 2.32803 6.01511 3.17157 5.17157C4.34315 4 6.22876 4 10 4Z"
                                                    fill="#ffffff"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M21.9995 12.8175L21.591 12.409C20.7123 11.5303 19.2877 11.5303 18.409 12.409L17.6076 13.2104C17.2878 12.3573 16.4648 11.75 15.5 11.75C14.2574 11.75 13.25 12.7574 13.25 14V15.7638C12.7601 15.8183 12.2847 16.0334 11.909 16.409C11.0303 17.2877 11.0303 18.7123 11.909 19.591L12.318 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12C2 11.5581 2 11.142 2.00189 10.75H21.9981C22 11.142 22 11.5581 22 12C22 12.283 22 12.5553 21.9995 12.8175ZM6 15.25C5.58579 15.25 5.25 15.5858 5.25 16C5.25 16.4142 5.58579 16.75 6 16.75H10C10.4142 16.75 10.75 16.4142 10.75 16C10.75 15.5858 10.4142 15.25 10 15.25H6Z"
                                                    fill="#ffffff"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.5 13.25C15.9142 13.25 16.25 13.5858 16.25 14V18.1893L16.9697 17.4697C17.2626 17.1768 17.7374 17.1768 18.0303 17.4697C18.3232 17.7626 18.3232 18.2374 18.0303 18.5303L16.0303 20.5303C15.7374 20.8232 15.2626 20.8232 14.9697 20.5303L12.9697 18.5303C12.6768 18.2374 12.6768 17.7626 12.9697 17.4697C13.2626 17.1768 13.7374 17.1768 14.0303 17.4697L14.75 18.1893V14C14.75 13.5858 15.0858 13.25 15.5 13.25ZM19.4697 13.4697C19.7626 13.1768 20.2374 13.1768 20.5303 13.4697L22.5303 15.4697C22.8232 15.7626 22.8232 16.2374 22.5303 16.5303C22.2374 16.8232 21.7626 16.8232 21.4697 16.5303L20.75 15.8107V20C20.75 20.4142 20.4142 20.75 20 20.75C19.5858 20.75 19.25 20.4142 19.25 20V15.8107L18.5303 16.5303C18.2374 16.8232 17.7626 16.8232 17.4697 16.5303C17.1768 16.2374 17.1768 15.7626 17.4697 15.4697L19.4697 13.4697Z"
                                                    fill="#ffffff"></path>
                                            </g>
                                        </svg></a>
                                    <h6>Riwayat</h6>
                                </div>
                            </div>


                            @endif

                        </div>
                        @if (Auth::user()->toko)
                        <div class="col-md-4 mt-4">
                            <h2>Informasi Toko</h2>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Nama Toko:
                                    @if (Auth::user()->toko->nama_toko)
                                    <a href="{{ route('toko.detail', Auth::user()->toko->id) }}">
                                        <small class="fw-bold" id="nama_toko">{{ Auth::user()->toko->nama_toko}}</small>
                                    </a>

                                    @else
                                    <small class="fw-bold" id="nama_toko">Tambahkan nama_toko Anda</small
                                        class="fw-bold">
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    Deskripsi:
                                    @if (Auth::user()->toko->deskripsi)
                                    <small class="fw-bold" id="deskripsi">{{ Auth::user()->toko->deskripsi }}</small
                                        class="fw-bold">
                                    @else
                                    <small class="fw-bold" id="deskripsi"><i>Tambahkan Nomor deskripsi Anda</i></small>
                                    @endif

                                </li>
                                <li class="list-group-item">
                                    Alamat:
                                    @if (Auth::user()->toko->alamat)
                                    <small class="fw-bold" id="alamat">{{ Auth::user()->toko->alamat }}</small
                                        class="fw-bold">
                                    @else
                                    <small class="fw-bold" id="alamat"><i>Tambahkan Alamat Anda</i></small>
                                    @endif

                                </li>

                                <li class="list-group-item d-flex">
                                    Rating Toko:
                                    @if (Auth::user()->toko->rating)
                                    <div class="d-flex ratings text-nowrap ms-2">
                                        @php
                                        $rating = Auth::user()->toko->rating;
                                        @endphp
                                        <div class="ratings">
                                            @for ($i = 1; $i <= 5; $i++) <i
                                                class="fa fa-star {{ $i <= $rating ? 'rating-color' : '' }}"></i>
                                                @endfor
                                        </div>
                                        <small class="ms-2 fw-lighther">{{ Auth::user()->toko->rating }}</small>
                                    </div>
                                    @else
                                    <small class="fw-bold" id="Rating"><i>Tambahkan Rating Anda</i></small>
                                    @endif

                                </li>
                                <a href="{{ route('toko.edit', Auth::user()->toko->id) }}"
                                    class="btn btn-warning text-light btn-sm mb-3 my-3 fadeInUp"
                                    data-wow-delay="0.1s">Edit Toko Anda
                                </a>
                                <a href="{{ route('produk.tambah') }}" class="btn btn-success btn-sm mb-3 fadeInUp"
                                    data-wow-delay="0.1s">Tambahkan Produk
                                </a>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container-fluid">
                        <ul class="nav nav-pills d-flex flex-wrap justify-content-center border-bottom mb-5 mt-5">
                            <li class="nav-item col-6 col-md-4 text-center">
                                <a class="d-flex align-items-center justify-content-center text-start pb-3 active"
                                    data-bs-toggle="pill" href="#tab-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="red"
                                        class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                    </svg>
                                    <div class="ps-3">
                                        <small class="text-body">Makanan</small>
                                        <h6 class="mt-n1 mb-0">Favorit</h6>
                                    </div>
                                </a>
                            </li>

                            @if (Auth::user()->toko)
                            <li class="nav-item col-6 col-md-4 text-center">
                                <a class="d-flex align-items-center justify-content-center text-start pb-3"
                                    data-bs-toggle="pill" href="#tab-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                        class="bi bi-shop" viewBox="0 0 16 16">
                                        <path
                                            d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
                                    </svg>
                                    <div class="ps-3">
                                        <small class="text-body">Kelola Toko Anda</small>
                                        <h6 class="mt-n1 mb-0">{{ Auth::user()->toko->nama_toko }}</h6>
                                    </div>
                                </a>
                            </li>
                            @else
                            <li class="nav-item col-6 col-md-4 text-center">
                                <a class="d-flex align-items-center justify-content-center text-start pb-3"
                                    data-bs-toggle="pill" href="#tab-2">
                                    <a href="{{ route('toko.tambah') }}" class="btn btn-success rounded text-light">
                                        Buat Toko
                                    </a>
                                </a>
                            </li>
                            @endif
                            @if (Auth::user()->produk->isNotEmpty())
                            <li class="nav-item col-6 col-md-4 text-center">
                                <a class="d-flex align-items-center justify-content-center text-start pb-3"
                                    data-bs-toggle="pill" href="#tab-3">
                                    <svg fill="#42d9ff" width="25px" height="25px" viewBox="0 0 1920 1920"
                                        xmlns="http://www.w3.org/2000/svg" stroke="#42d9ff">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M746.667 106.667H1173.33V1493.33H746.667V106.667ZM533.333 533.333H106.667V1493.33H533.333V533.333ZM1920 1706.67H0V1824H1920V1706.67ZM1813.33 746.667H1386.67V1493.33H1813.33V746.667Z">
                                            </path>
                                        </g>
                                    </svg>
                                    <div class="ps-3">
                                        <small class="text-body">Analisa</small>
                                        <h6 class="mt-n1 mb-0">Produk</h6>
                                    </div>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="tab-content  fadeInUp" data-wow-delay="0.1s">
                    <div id="tab-1" class="tab-pane fade show p-0 fadeInUp active" data-wow-delay="0.1s">
                        @if(Auth::user()->favorite->isNotEmpty())
                        <div class="row">
                            @foreach ($favorite as $items)
                            <a href="{{ route('detail', [$items->produk->id, $items->produk->nama]) }}"
                                class="ms-auto col-lg-3 text-dark col-md-5 col-6 position-relative">
                                <div class=" mb-4">
                                    <div class="card" style="border: none">
                                        <!-- Jika belum ada di favorit, tampilkan tombol untuk menambah favorit -->
                                        <form action="{{ route('favorites.hapus', $items->produk_id) }}" method="POST"
                                            class="position-absolute top-0 end-0 m-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-transparent">
                                                <i class="fa fa-heart text-danger fa-2x"></i> <!-- Favorit sudah ada -->
                                            </button>
                                        </form>
                                        <img src="{{ asset('storage/' . $items->produk->foto) }}" class="card-img-top"
                                            alt="{{ $items->produk->nama }}" style="border-radius: 15px">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $items->produk->nama }}</h5>
                                            <p class="card-text ellipsis">{{ $items->produk->deskripsi }}</p>
                                            <h5 class="text-primary">Rp.{{ number_format($items->produk->harga, 0, ',',
                                                '.') }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        @elseif(Auth::user()->favorite->isEmpty())
                        <div id="tab-1" class="tab-pane fade show p-0 active fadeInUp" data-wow-delay="0.1s">
                            <p>Anda belum memiliki produk favorit.</p>
                        </div>
                        @endif
                    </div>

                    @if (Auth::user()->toko)
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row container-fluid mt-4">
                            @foreach (Auth::user()->produk as $item)
                            <div class="positioin-relative ms-auto col-lg-3 text-dark col-md-4 col-6">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-header text-start">
                                            <h6>Operasi</h6>
                                        </li>
                                        <li>
                                            <form class="dropdown-item"
                                                action="{{ route('produk.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button style="border:none;background:none;outline:none;">Hapus</button>
                                            </form>
                                        </li>
                                        <li>
                                            <a href="{{ route('produk.edit', [$item->id, $item->nama]) }}"
                                                class="dropdown-item">
                                                <button style="border:none;background:none;outline:none;">Perbarui
                                                    Produk</button>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="position-relative">
                                    <div class="mb-4">
                                        <div class="card" style="border: none">
                                            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top"
                                                alt="{{ $item->nama }}" style="border-radius: 15px">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->nama }}</h5>
                                                <p class="card-text ellipsis">{{ $item->deskripsi }}</p>
                                                <h5 class="text-primary">Rp.{{ $item->harga }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>

                    @else
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <small>Buat Toko Anda!</small>
                    </div>
                    @endif
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="container mt-5">
                            <h2>Analisa Penjualan Produk</h2>
                            @if ($dataTerjual)
                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Jual</th>
                                        <th>Jumlah Terjual</th>
                                        <th>Keuntungan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataTerjual as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/'. $item->produk->foto) }}" height="100"
                                                width="auto" alt=""></td>
                                        <td>{{ $item->produk->nama }}</td>
                                        <td>{{ number_format($item->produk->harga, 2) }}</td>
                                        <td>{{ $item->total_terjual }}</td>
                                        <td>{{ number_format($item->total_keuntungan, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <p>Produk tidak ditemukan.</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- menu End -->
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

    <!-- Template Javascript -->
    <script src="{{ asset('template/js/main.js') }}"></script>
</body>

</html>
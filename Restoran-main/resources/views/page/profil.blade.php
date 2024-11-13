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

<body style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9))">
    <div class="container-xxl bg-white p-0">

        {{-- nav --}}
        @include('bagian.nav')

        <div class="container-fluid bg-dark hero-header py-2" style="width: 100%">
            <div class="container py-3 py-lg-3 my-lg-5">
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
                            <h3 class="mt-4">Keranjang</h3>
                            <div class="container overflow-auto">
                                <table class="table" style="min-width: 300px">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">No</th>
                                            <th class="text-center" scope="col">Nama Produk</th>
                                            <th class="text-center" scope="col">Tanggal Ditambahkan</th>
                                            <th class="text-center" scope="col">Jumlah</th>
                                            <th class="text-center" scope="col">Harga</th>
                                            <th class="text-center" scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjang as $index => $keranjang)
                                        <tr>
                                            <th class="text-center" style="white-space: nowrap;" scope="row">{{ $index +
                                                1
                                                }}</th>
                                            <td class="text-center" style="white-space: nowrap;">{{
                                                $keranjang->produk->nama
                                                }}</td>
                                            <td class="text-center" style="white-space: nowrap;">{{
                                                $keranjang->created_at->format('d F Y') }}
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $keranjang->quantity
                                                }}
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">Rp.{{
                                                number_format($keranjang->produk->harga,
                                                0, ',', '.') }}</td>
                                            <td class="text-center" style="white-space: nowrap;">Rp.{{
                                                number_format($keranjang->produk->harga *
                                                $keranjang->quantity, 0,
                                                ',', '.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <a href="{{ route('keranjang', $keranjang) }}" class="btn btn-info btn-sm">Lihat
                                Detail</a>
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
                                    data-wow-delay="0.1s">Edit
                                    Toko Anda
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
                        </ul>
                    </div>
                </div>
                <div class="tab-content  fadeInUp" data-wow-delay="0.1s">
                    <div id="tab-1" class="tab-pane fade show p-0 active fadeInUp" data-wow-delay="0.1s">
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
                                            <p class="card-text">{{ $items->produk->deskripsi }}</p>
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
                        <div class="row mt-4">
                            @foreach (Auth::user()->produk as $item)
                            <a href="{{ route('produk.edit', [$item->id, $item->nama]) }}"
                                class="ms-auto col-lg-3 text-dark col-md-5 col-6 position-relative">
                                <div class=" mb-4">
                                    <div class="card" style="border: none">
                                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top"
                                            alt="{{ $item->nama }}" style="border-radius: 15px">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->nama }}</h5>
                                            <p class="card-text">{{ $item->deskripsi }}</p>
                                            <h5 class="text-primary">Rp.{{ number_format($item->harga, 0, ',',
                                                '.') }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="d-flex justify-content-end">
                                <form action="{{ route('produk.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE ')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <small>Buat Toko Anda!</small>
                    </div>
                    @endif

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
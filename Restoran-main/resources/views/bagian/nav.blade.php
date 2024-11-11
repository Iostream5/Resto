<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Brand/logo atau icon -->
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
        </a>

        <!-- Tombol Toggle untuk Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- Menu Nav Links -->
            <div class="navbar-nav ms-auto py-0 pe-4 order-2 order-lg-1">
                <a href="/" class="nav-item nav-link">Home</a>
                <a href="/search" class="nav-item nav-link">Cari Makanan</a>
                <a href="/about" class="nav-item nav-link">About</a>
                <a href="/favorit" class="nav-item nav-link">Populer</a>
            </div>
            @if (Auth::check())
            <div class=" d-flex align-items-center mb-2 order-1 order-lg-3">
                <a href="/profil">
                    <img src="{{ asset('/img/logo.png') }}" height="70" width="70" alt="Profile Image"
                        class="profile-image">
                </a>
            </div>
            @else
            <div class=" d-flex align-items-center order-3 order-lg-2">
                <a href="{{ route('login') }}" class="btn btn-primary me-2">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary me-3">Daftar</a>
            </div>
            @endif

        </div>
    </div>
</nav>

<style>
    .navbar {
        padding-top: 0.5rem;
        /* Menyesuaikan jarak atas */
        padding-bottom: 0.5rem;
        /* Menyesuaikan jarak bawah */
    }

    .profile-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        /* Menjaga proporsi gambar */
        border-radius: 50%;
        /* Membuat gambar menjadi lingkaran */
        /* border: 2px solid white; Border putih untuk tampilan rapi */
    }
</style>
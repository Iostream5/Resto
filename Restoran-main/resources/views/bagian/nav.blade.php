<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Brand/logo atau icon di sini jika ada -->
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
        </a>

        <!-- Tombol Toggle untuk Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Profil Icon (Muncul di Paling Atas pada Mobile) -->
            <div class="d-flex align-items-center mb-2 order-1 order-lg-3" style="width:50px; height:50px;">
                <a href="/profil">
                    <img src="{{ asset('/img/toko.jpg') }}" alt="Profile Image" style="width: 50px; height:50px; border-radius:50%;">
                </a>
            </div>

            <!-- Menu Nav Links -->
            <div class="navbar-nav ms-auto py-0 pe-4 order-2 order-lg-1">
                <a href="/" class="nav-item nav-link">Home</a>
                <a href="/search" class="nav-item nav-link">Cari Makanan</a>
                <a href="/about" class="nav-item nav-link">About</a>
                <a href="/favorit" class="nav-item nav-link">Populer</a>
            </div>

            <!-- Tombol Masuk & Daftar -->
            <div class="d-flex order-3 order-lg-2">
                <a href="" class="btn btn-primary me-2">Masuk</a>
                <a href="" class="btn btn-outline-primary me-3">Daftar</a>
            </div>
        </div>
    </div>
</nav>

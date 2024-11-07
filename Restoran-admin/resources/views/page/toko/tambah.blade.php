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
                        <img src="{{ asset('template/src/assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
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
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="heading d-flex align-items-center justify-content-between">
                                    <h5 class="card-title mb-9 fw-semibold">Data Toko</h5>
                                    <a href="{{ route('toko.tampil') }}" class="btn btn-success">Lihat data <svg
                                            viewBox="0 0 24 24" class="fw-bold" height="15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                                                    stroke="#fff" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </path>
                                            </g>
                                        </svg></a>
                                </div>
                                <form action="{{ route('toko.simpan') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="fw-bolder my-2">Nama Toko</label>
                                        <input type="text" class="form-control form-control-lg" id="nama_toko"
                                            name="nama_toko" placeholder="Masukkan Nama Toko" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="fw-bolder my-2">Alamat</label>
                                        <textarea class="form-control form-control-lg" id="alamat" name="alamat"
                                            placeholder="Masukkan Alamat" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="fw-bolder my-2">Deskripsi</label>
                                        <textarea class="form-control form-control-lg" id="deskripsi" name="deskripsi"
                                            placeholder="Masukkan deskripsi" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="fw-bolder my-2">Rating</label>
                                        <input type="range" step="0.1" min="0" max="5"
                                            class="form-control form-control-lg" id="rating" name="rating"
                                            placeholder="Masukkan Rating (0-5)" oninput="updateRatingValue(this.value)">
                                        <span id="rating-value">0</span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="fw-bolder my-2">Foto</label>
                                        <input type="file" class="form-control form-control-lg" id="foto" name="foto"
                                            onchange="previewImage(event)">
                                    </div>

                                    <div class="mb-3">
                                        <img id="imagePreview" src="#" alt="Preview Foto"
                                            style="max-width: 150px; display: none;">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
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
    <script>
        function previewImage(event) {
                    const input = event.target;
                    const preview = document.getElementById('imagePreview');

                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
        
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        };
        
                        reader.readAsDataURL(input.files[0]);
                    }
                }
    </script>
    <script>
        function updateRatingValue(value) {
            document.getElementById("rating-value").textContent = value;
        }
    
        // Set nilai default saat halaman pertama kali dimuat
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("rating").value = 0;
            updateRatingValue(0);
        });
    </script>
</body>

</html>
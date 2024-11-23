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
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="heading d-flex align-items-center justify-content-between">
                                    <h5 class="card-title mb-9 fw-semibold">Edit Data Kategori</h5>
                                </div>
                                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <label class="fw-bolder my-2">Nama Kategori</label>
                                    <input required name="nama_kategori" class="form-control form-control-lg"
                                        type="text" value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                                        placeholder="Masukan nama kategori" aria-label=".form-control-lg example">

                                    <label class="fw-bolder my-2">Foto Kategori</label>
                                    <input required name="foto" accept="image/*" class="form-control form-control-lg"
                                        id="formFileLg" type="file" onchange="previewImage(event)">

                                    <div style="margin-top: 20px;">
                                        <img id="imagePreview" src="{{ asset('storage/'. $kategori->foto) }}"
                                            alt="Preview Foto"
                                            style="max-width: 300px; display: {{ $kategori->foto ? 'block' : 'none' }};">
                                    </div>
                                    <button class="btn btn-primary my-3">Edit
                                        <svg class="ms-2" height="15" viewBox="0 0 24 24" fill="#fff"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z"
                                                    stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M21 21H12" stroke="#fff" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </button>

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
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
        imagePreview.style.display = 'block';
    }
    </script>
</body>

</html>
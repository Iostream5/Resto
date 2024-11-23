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
                                    <h5 class="card-title mb-9 fw-semibold">Data Produk</h5>
                                    <a href="{{ route('produk.tampil') }}" class="btn btn-success">Lihat data <svg
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
                                <form action="{{ route('produk.simpan') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label class="fw-bolder my-2">Nama Toko</label>
                                    <select required class="form-control form-control-lg"
                                        aria-label=".form-control-lg example" name="toko_id" id="">
                                        <option selected>Nama toko</option>
                                        @foreach ($toko as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_toko }}</option>
                                        @endforeach
                                    </select>

                                    <label class="fw-bolder my-2">Nama Produk</label>
                                    <input required name="nama" class="form-control form-control-lg" type="text"
                                        placeholder="Masukan nama produk" aria-label=".form-control-lg example">

                                    <label class="fw-bolder my-2">Harga Produk</label>
                                    <input required name="harga" class="form-control form-control-lg" type="text"
                                        placeholder="Masukan harga produk" aria-label=".form-control-lg example">

                                    <label class="fw-bolder my-2">Deskripsi</label>
                                    <input required name="deskripsi" class="form-control form-control-lg" type="text"
                                        placeholder="Masukan deskripsi produk" aria-label=".form-control-lg example">

                                    <label class="fw-bolder my-2">Kategori Makanan</label>
                                    <select required class="form-control form-control-lg"
                                        aria-label=".form-control-lg example" name="kategori_id">
                                        <option selected>pilih kategori makanan</option>
                                        @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>

                                    <div class="mb-3">
                                        <label class="fw-bolder my-2">Rating</label>
                                        <input type="range" step="0.1" min="0" max="5"
                                            class="form-control form-control-lg" id="rating" name="rating"
                                            placeholder="Masukkan Rating (0-5)" oninput="updateRatingValue(this.value)">
                                        <span id="rating-value">0</span>
                                    </div>

                                    <label class="fw-bolder my-2">Foto Makanan</label>
                                    <input required name="foto" class="form-control form-control-lg" id="formFileLg"
                                        type="file" onchange="previewImage(event)">

                                    <div style="margin-top: 20px;">
                                        <img id="imagePreview" src="" alt="Preview Foto"
                                            style="max-width: 300px; display: none;">
                                    </div>
                                    <button class="btn btn-primary my-3">Kirim<svg height="15" class="ms-2"
                                            viewBox="0 -4.15 57.875 57.875" xmlns="http://www.w3.org/2000/svg"
                                            fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g id="Group_37" data-name="Group 37"
                                                    transform="translate(-1209.722 -1357.465)">
                                                    <path id="Path_95" data-name="Path 95"
                                                        d="M1224.729,1387.963v16.4l26.032-28.734Z" fill="#d1d3d4"
                                                        stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="4"></path>
                                                    <path id="Path_96" data-name="Path 96"
                                                        d="M1228.118,1390.522l37.479-30.686-17.1,45.207Z" fill="#ffffff"
                                                        stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="4"></path>
                                                    <path id="Path_97" data-name="Path 97"
                                                        d="M1211.722,1378.673l16.4,11.712,37.479-30.92Z" fill="#ffffff"
                                                        stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="4"></path>
                                                </g>
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
        
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("rating").value = 0;
                updateRatingValue(0);
            });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tefatie Resto</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="form-container container mt-5">
        <h2 class="text-center">Buat Produk Anda</h2>
        <form action="{{ route('produk.simpan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <label class="fw-bolder my-2">Nama Toko</label> --}}
            <input class="form-control" type="hidden" name="toko_id" value="{{ Auth::user()->toko->id }}">

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
            <select required class="form-control form-control-lg" aria-label=".form-control-lg example"
                name="kategori_id">
                <option selected>pilih kategori makanan</option>
                @foreach ($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                @endforeach

            </select>

            <label class="fw-bolder my-2">Foto Makanan</label>
            <input required name="foto" class="form-control form-control-lg" id="formFileLg" type="file"
                onchange="previewImage(event)">

            <div style="margin-top: 20px;">
                <img id="imagePreview" src="" alt="Preview Foto" style="max-width: 300px; display: none;">
            </div>
            <button type="submit" class="btn btn-primary my-3">Kirim<svg height="15" class="ms-2"
                    viewBox="0 -4.15 57.875 57.875" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g id="Group_37" data-name="Group 37" transform="translate(-1209.722 -1357.465)">
                            <path id="Path_95" data-name="Path 95" d="M1224.729,1387.963v16.4l26.032-28.734Z"
                                fill="#d1d3d4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="4"></path>
                            <path id="Path_96" data-name="Path 96" d="M1228.118,1390.522l37.479-30.686-17.1,45.207Z"
                                fill="#ffffff" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="4">
                            </path>
                            <path id="Path_97" data-name="Path 97" d="M1211.722,1378.673l16.4,11.712,37.479-30.92Z"
                                fill="#ffffff" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="4">
                            </path>
                        </g>
                    </g>
                </svg>
            </button>

        </form>
    </div>

    {{-- Footer --}}
    @include('bagian.footer')

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

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

    <script src="js/main.js"></script>
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
</body>

</html>
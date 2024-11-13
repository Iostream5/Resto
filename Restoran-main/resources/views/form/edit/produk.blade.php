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
        <h2 class="text-center">Edit Produk Anda</h2>
        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input class="form-control" type="hidden" name="toko_id" value="{{ Auth::user()->toko->id }}">

            <label class="fw-bolder my-2">Nama Produk</label>
            <input required name="nama" value="{{ old('nama', $produk->nama) }}" class="form-control form-control-lg"
                type="text" placeholder="Masukan nama produk" aria-label=".form-control-lg example">

            <label class="fw-bolder my-2">Harga Produk</label>
            <input required name="harga" value="{{ old('harga', $produk->harga) }}" class="form-control form-control-lg"
                type="text" placeholder="Masukan harga produk" aria-label=".form-control-lg example">

            <label class="fw-bolder my-2">Deskripsi</label>
            <input required name="deskripsi" value="{{ old('deskripsi', $produk->deskripsi) }}"
                class="form-control form-control-lg" type="text" placeholder="Masukan deskripsi produk"
                aria-label=".form-control-lg example">

            <label class="fw-bolder my-2">Kategori Makanan</label>
            <select required class="form-control form-control-lg" aria-label=".form-control-lg example"
                name="kategori_id">
                <option selected value="{{ old('kategori_id', $produk->kategori_id) }}">{{
                    old('kategori_id', $produk->kategori_id) }}</option>
                @foreach ($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label class="fw-bolder my-2">Rating</label>
                <input type="range" step="0.1" min="0" max="5" class="form-control form-control-lg" id="rating"
                    name="rating" placeholder="Masukkan Rating (0-5)" oninput="updateRatingValue(this.value)">
                <span id="rating-value">{{ old('rating', $produk->rating) }}</span>
            </div>

            <label class="fw-bolder my-2">Foto Makanan</label>
            <input required name="foto" class="form-control form-control-lg" id="formFileLg" type="file"
                onchange="previewImage(event)">

            <div style="margin-top: 20px;">
                <img id="imagePreview" src="{{ asset('storage/'. $produk->foto) }}" alt="Preview Foto"
                    style="max-width: 300px; display: {{ $produk->foto ? 'block' : 'none' }};">
            </div>
            <button class="btn btn-primary my-3">Edit
                <svg class="ms-2" height="15" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z"
                            stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M21 21H12" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round">
                        </path>
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
    <script>
        function updateRatingValue(value) {
                    document.getElementById("rating-value").textContent = value;
                }
            
                document.addEventListener("DOMContentLoaded", function() {
                    document.getElementById("rating").value = {{ old('rating', $toko->rating) }};
                    updateRatingValue({{ old('rating', $toko->rating) }});
                });
    </script>
</body>

</html>
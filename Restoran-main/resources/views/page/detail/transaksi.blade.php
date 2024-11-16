<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
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
    <link href="{{ asset ('template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
</head>

<body style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9))">

    <div class="container-xxl bg-white p-0">
        {{-- nav --}}
        @include('bagian.nav')

        <div class="container-fluid bg-dark py-2 d-lg-block d-none" style="width: 100%">
            <div class="container py-3 py-lg-3 my-lg-3">
            </div>
        </div>
        <div class="container-xxl">
            <div class="container">
                <div class="text-center wow fadeInUp my-5" data-wow-delay="0.1s">
                    <h1 class="mb-5">Riwayat pembelian</h1>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show p-0 active">
                        <div class="container">
                            @foreach ($penjualan as $item)
                            <div class="container">
                                <div class="d-flex">
                                    <img class="img-fluid rounded" src="{{ asset('storage/' . $item->produk->foto) }}"
                                        alt="" style="width:20rem;">
                                    <div class="ms-4">
                                        <h2>Nama Produk: {{ $item->produk->nama }}</h2>
                                        <h2>Jumlah yang di Pesan: {{ $item->jumlah_terjual}}</h2>
                                        <h2>Harga Satuan: {{ $item->produk->harga}}</h2>
                                        <h2>Total Harga Produk Yang di Pesan: {{ $item->total_harga}}</h2>
                                        <h2 class="mt-4">Di Pesan Pada : {{ $item->created_at}}</h2>

                                    </div>

                                </div>
                                <div class="col-12 text-end mt-3">
                                    <a href="{{ route('struk', $item->id) }}" type="button" class="btn btn-primary"
                                        id="checkout-btn">Lihat
                                        Struk</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('bagian.footer')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('template/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('templatelib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
    <script>
        function showSuccessMessage() {
            Swal.fire({
                title: 'Berhasil Checkout!',
                text: 'Terimakasih telah melakukan pembelian.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('profil') }}';
                }
            });
        }
    </script>
</body>

</html>
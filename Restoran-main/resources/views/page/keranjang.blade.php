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
                    <h1 class="mb-5">Keranjang || Ayo Checkout Sekarang!!</h1>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <form action="{{ route('cart.checkout') }}" method="POST" id="checkoutForm">
                                @csrf
                                @foreach ($keranjang as $item)
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <!-- Checkbox Produk -->
                                        <input type="checkbox" class="product-checkbox me-4" name="produk_id[]"
                                            value="{{ $item->produk->id }}" data-price="{{ $item->produk->harga }}"
                                            data-name="{{ $item->produk->nama }}">
                                        <img class="flex-shrink-0 img-fluid rounded"
                                            src="{{ asset('storage/' . $item->produk->foto) }}"
                                            alt="{{ $item->produk->nama }}" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>{{ $item->produk->nama }}</span>
                                                <span class="text-primary">Rp.{{ number_format($item->produk->harga)
                                                    }}</span>
                                            </h5>
                                            <div class="d-flex justify-content-between">
                                                <small class="fst-italic">{{ $item->produk->toko->nama_toko }}</small>
                                                <div class="mb-3 d-flex align-items-center">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-action="decrease" data-id="{{ $item->id }}">-</button>
                                                    <input name="jumlah_terjual[]" type="text" class="text-center"
                                                        style="width: 50px" id="quantity_{{ $item->id }}"
                                                        value="{{ $item->quantity }}" readonly>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-action="increase" data-id="{{ $item->id }}">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <input type="hidden" name="selected_products" id="selectedProductsInput">

                                <div class="col-12 text-end mt-3">
                                    <button type="button" class="btn btn-primary" id="checkout-btn">Pesan!</button>
                                </div>
                            </form>

                            <!-- Modal Konfirmasi Checkout -->
                            <div class="modal fade" id="checkoutModal" tabindex="-1"
                                aria-labelledby="checkoutModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="checkoutModalLabel">Detail Pembelian</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="checkoutDetails">
                                                <!-- Detail Produk akan Muncul di Sini -->
                                            </div>
                                            <hr>
                                            <h6>Total Harga: <span id="totalPrice">Rp. 0</span></h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btn-primary" id="confirmCheckoutBtn"
                                                onclick="showSuccessMessage()">Checkout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        document.addEventListener('DOMContentLoaded', function () {
    // Tambah Jumlah Produk
    document.querySelectorAll('button[data-action="increase"]').forEach(function (button) {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-id');
            const quantityInput = document.getElementById('quantity_' + productId);
            const currentValue = parseInt(quantityInput.value) || 0;
            quantityInput.value = currentValue + 1;
        });
    });

    // Kurangi Jumlah Produk
    document.querySelectorAll('button[data-action="decrease"]').forEach(function (button) {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-id');
            const quantityInput = document.getElementById('quantity_' + productId);
            const currentValue = parseInt(quantityInput.value) || 0;
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });
    });

    // Tampilkan Modal ketika Tombol Pesan diklik
    document.getElementById('checkout-btn').addEventListener('click', function () {
        const selectedProducts = [];
        let totalPrice = 0;

        // Loop untuk mendapatkan produk yang dipilih
        document.querySelectorAll('.product-checkbox:checked').forEach(function (checkbox) {
            const productId = checkbox.value;
            var quantityInput = document.getElementById('quantity_' + productId);
            if (!quantityInput) {
            console.error('Element with ID "quantity_' + productId + '" not found.');
            return;
            }
            
            var quantity = parseInt(quantityInput.value);
            const price = parseFloat(checkbox.getAttribute('data-price'));
            const productName = checkbox.getAttribute('data-name');

            selectedProducts.push({
                productId: productId,
                productName: productName,
                price: price,
                quantity: quantity,
                total: price * quantity
            });

            totalPrice += price * quantity;
        });

        if (selectedProducts.length === 0) {
            alert("Silakan pilih produk terlebih dahulu.");
            return;
        }

        // Tampilkan Detail di Modal
        const checkoutDetails = document.getElementById('checkoutDetails');
        checkoutDetails.innerHTML = ''; // Kosongkan isi sebelumnya
        selectedProducts.forEach(function (product) {
            checkoutDetails.innerHTML += `
                <p>${product.productName} - ${product.quantity} x Rp. ${product.price.toLocaleString()} = Rp. ${product.total.toLocaleString()}</p>
            `;
        });

        document.getElementById('totalPrice').innerText = 'Rp. ' + totalPrice.toLocaleString();
        document.getElementById('selectedProductsInput').value = JSON.stringify(selectedProducts);

        // Tampilkan Modal
        const checkoutModal = new bootstrap.Modal(document.getElementById('checkoutModal'));
        checkoutModal.show();
    });

    // Konfirmasi Checkout
    document.getElementById('confirmCheckoutBtn').addEventListener('click', function () {
        document.getElementById('checkoutForm').submit();
    });
});

    </script>
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
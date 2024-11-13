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

        <div class="container-fluid bg-dark hero-header py-2" style="width: 100%">
            <div class="container py-3 py-lg-3 my-lg-4">
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
                            <form action="{{ route('cart.checkout') }}" method="POST">
                                @csrf
                                @foreach ($keranjang as $item)
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        {{-- Checkbox untuk memilih produk --}}
                                        <input type="checkbox" class="product-checkbox me-4" value="{{ $item->id }}"
                                            data-price="{{ $item->produk->harga }}"
                                            data-name="{{ $item->produk->nama }}">
                                        <img class="flex-shrink-0 img-fluid rounded"
                                            src="{{ asset('storage/' . $item->produk->foto) }}" alt=""
                                            style="width: 80px;">
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
                                                    <input type="text" class="text-center" style="width: 50px"
                                                        name="quantity[{{ $item->id }}]" id="quantity_{{ $item->id }}"
                                                        value="{{ $item->quantity }}" class="form-control" readonly>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-action="increase" data-id="{{ $item->id }}">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-12 text-end mt-3">
                                    <button type="button" class="btn btn-primary" id="checkout-btn">Checkout !</button>
                                </div>
                            </form>
                            <div class="modal fade" id="checkoutModal" tabindex="-1"
                                aria-labelledby="checkoutModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="checkoutModalLabel">Detail Pembelian</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="checkoutDetails"></div>
                                            <hr>
                                            <h6>Total Harga: <span id="totalPrice">Rp. 0</span></h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary"
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
        // Function to update the quantity of products
        document.querySelectorAll('[data-action="increase"], [data-action="decrease"]').forEach(function (button) {
            button.addEventListener('click', function () {
                var productId = this.getAttribute('data-id');
                var quantityInput = document.getElementById('quantity_' + productId);
                var currentQuantity = parseInt(quantityInput.value);
                
                if (this.getAttribute('data-action') === 'increase') {
                    quantityInput.value = currentQuantity + 1;
                } else if (this.getAttribute('data-action') === 'decrease') {
                    if (currentQuantity > 1) {
                        quantityInput.value = currentQuantity - 1;
                    }
                }
            });
        });
    
        // Handle the checkout button click event
        document.getElementById('checkout-btn').addEventListener('click', function () {
            var selectedProducts = [];
            var totalPrice = 0;
            
            // Loop through the checked products
            document.querySelectorAll('.product-checkbox:checked').forEach(function (checkbox) {
                var productId = checkbox.value;
                var quantity = parseInt(document.getElementById('quantity_' + productId).value);
                var price = parseFloat(checkbox.getAttribute('data-price')); // Assume we added a data-price attribute
                var productName = checkbox.getAttribute('data-name'); // Assume we added a data-name attribute
                
                // Add product data to selectedProducts
                selectedProducts.push({
                    id: productId,
                    name: productName,
                    price: price,
                    quantity: quantity,
                    total: price * quantity
                });
                
                totalPrice += price * quantity; // Calculate total price
            });
            
            // Populate the modal with selected products and total price
            var checkoutDetails = document.getElementById('checkoutDetails');
            checkoutDetails.innerHTML = ''; // Clear previous details
            selectedProducts.forEach(function (product) {
                checkoutDetails.innerHTML += `
                    <p>${product.name} - ${product.quantity} x Rp. ${product.price.toLocaleString()} = Rp. ${product.total.toLocaleString()}</p>
                `;
            });
            
            document.getElementById('totalPrice').innerText = 'Rp. ' + totalPrice.toLocaleString();
            
            // Show the modal
            var checkoutModal = new bootstrap.Modal(document.getElementById('checkoutModal'));
            checkoutModal.show();
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
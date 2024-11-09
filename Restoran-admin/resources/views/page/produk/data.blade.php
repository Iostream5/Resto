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
                <div class="container">
                    <h1>Produk</h1>
                    <a href="{{ route('produk.tambah') }}" class="btn btn-primary">Add Produk</a>
                    <table id="produkTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Toko</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#produkTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('produk.data') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nama', name: 'nama' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'harga', name: 'harga' },
                { data: 'kategori', name: 'kategori' },
                { data: 'toko', name: 'toko' },
                { data: 'foto', name: 'foto', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
    </script>
</body>

</html>
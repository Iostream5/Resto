<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .struck {
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 400px;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .items th,
        .items td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .total {
            text-align: right;
            margin-top: 10px;
            font-size: 1.2em;
        }
    </style>
</head>

<body>
    <div class="struck">
        <div class="header">
            <h2>Toko Anda</h2>
            <p>Terima kasih telah berbelanja!</p>
        </div>
        <p><strong>Nama:</strong> {{ $penjualan->user->name }}</p>
        <p><strong>Tanggal:</strong> {{ $penjualan->created_at->format('d-m-Y H:i') }}</p>
        <table class="items">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah Produk</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $penjualan->produk->nama }}</td>
                    <td>{{ $penjualan->jumlah_terjual }}</td>
                    <td>Rp {{ number_format($penjualan->produk->harga, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <p class="total"><strong>Total:</strong> Rp {{ number_format($totalHarga) }}</p>
    </div>
    <button class="no-print" onclick="window.print()">Cetak Struk</button>
</body>

</html>
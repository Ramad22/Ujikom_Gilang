<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Kasir</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border: 2px solid #000;
            padding: 10px;
            {{--  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);  --}}
            max-width: 400px;
            margin: auto;
            height: auto;
            {{--  position: relative;  --}}
        }

        .container::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px; /* Perubahan di sini */
            width: 100%;
            height: 2px;
            background-color: #000;
        }

        .header {
            {{--  text-align: center;  --}}
            margin-bottom: 2px;

        }

        .content table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        .content th, .content td {
            border: 1px solid #000;
            padding: 5px;
        }

        .content th {
            background-color: #f2f2f2;
        }

        .content .total {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 10px;
            display: block; /* Tambahkan */
        }

        .print-btn { /* Tambahkan */
            display: inline-block; /* Tambahkan */
            text-decoration: none;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <div class="container" id="strukContainer">
        <div class="header">
            <h4 class="text-center">Toko Abadi</h4>
            {{--  <p style="font-size: 12px;">Alamat: Jl. Contoh No. 123</p>  --}}
            <p style="font-size: 12px;">Kasir : {{auth()->user()->name}}</p>
            @foreach($detail as $p)
                @if($loop->first)
                    <p style="font-size: 12px;">No Transaksi : {{ $p->penjualan_id }}</p>
                    <p style="font-size: 12px;">Member : {{ $p->pelanggan ? $p->pelanggan->nama_pelanggan: '-' }}</p>
                    <p style="font-size: 12px; float: right;">Tanggal : {{ $p->penjualan->tanggal_penjualan }}</p>
                @endif
            @endforeach
        </div>
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Diskon</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detail as $p)
                        <tr>
                            <td>{{ $p->produk->nama_produk }} {{ $p->jumlah_produk . 'x' }}</td>
                            <td>{{ $p->produk && $p->produk->diskon ? $p->produk->diskon. '%': '-' }}</td>

                            <td>{{ number_format($p->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    @foreach($detail as $p)
                        @if($loop->first)
                            <tr>
                                <td colspan="3" class="total">Total: Rp{{ number_format($p->penjualan->total, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="total">Bayar: Rp{{ number_format($p->penjualan->bayar, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                {{-- <td colspan="3" class="total">Kembalian: Rp{{ number_format($p->penjualan->kembalian, 0, ',', '.') }}</td> --}}
                                <td colspan="3" class="total">Kembalian: Rp{{ number_format($p->penjualan->kembalian, 0, ',', '.') }}</td>

                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <small style="font-size: 12px;"  class="text-secondary"><b>Note : </b>Bila total tidak sesuai dengan keseluruhan itu disebabkan karena diskon minimum pembelian</small>

            <p style="font-size: 12px;" class="text-center mt-2">Terima kasih atas kunjungan Anda!</p>

        </div>
    </div>

    <div class="text-center"></div>
    <button class="btn btn-info text-white m-2 ms-5" onclick="printStruk();">Cetak</button>

    @if(auth()->user()->role === "admin")
        <a class="print-btn btn btn-primary" href="/admin.laporan">Kembali</a>
    @else
        <a class="print-btn btn btn-primary" href="/petugas.hasil-transaksi">Kembali</a>
    @endif

    <script>
    function printStruk() {
        var printContents = document.getElementById('strukContainer').innerHTML;
        var originalContents = document.body.innerHTML;

        // Menampilkan hanya bagian struk
        document.body.innerHTML = printContents;

        // Melakukan pencetakan
        window.print();

        // Mengembalikan halaman ke kondisi semula
        document.body.innerHTML = originalContents;
    }
</script>

</body>
<script src="{{ asset('assets/js/manual.js')}}"></script>

</html>

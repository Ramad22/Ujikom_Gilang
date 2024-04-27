@extends('admin.layout.main')
@section('konten')
    <!--  Modal trigger button  -->
    <h5 class="text-center">Laporan</h5>
    <div class="float-start ms-3">
        <select name="kategori" id="kategori" class="form-control w-25">
            <option value="">Pilih Kategori</option>
            <option value="barang">Barang</option>
            <option value="penjualan">Penjualan</option>
        </select>
    </div>
    <div class="table-responsive ms-3 mt-2 me-2" id="tabelBarang">
        <table class="table table-striped table-bordered">
            <thead class="table-white">
                <th>No</th>
                <th>Nama Produk</th>
                <th>Stok masuk</th>
                <th>Stok keluar</th>
                <th>Tanggal</th>
            </thead>
            @foreach ($laporan as $item)
                <tbody>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->stok_masuk }}</td>
                    <td>{{ $item->stok_keluar ? $item->stok_keluar : '-' }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-responsive ms-3 mt-2 me-2"" id="tabelPenjualan" style='display:none;'>

        <table class="table table-striped table-bordered">
            <thead class="table-white">
                <th>No</th>
                <th>Nama Petugas</th>
                <th>No Transaksi</th>
                <th>Tanggal Penjualan</th>
                <th>Total</th>
                <th>Nama Pelanggan</th>
                <th class="text-center">Invoice</th>
            </thead>
            @foreach ($penjualan as $d)
                <tbody>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{auth()->user()->name}}</td>
                    <td>{{ $d->penjualan_id }}</td>
                    <td>{{ \Carbon\Carbon::parse($d->tanggal_penjualan)->format('d-m-Y') }}</td>
                    <td>{{ number_format($d->total, 0, ',', '.') }}</td>
                    <td>{{ $d->pelanggan ? $d->pelanggan->nama_pelanggan : '-' }}</td>
                    <td class="text-center"><a href="{{ route('cetak', $d->penjualan_id) }}" class="btn btn-light text-secondary">Print</a>
                    </td>
            @endforeach
            </tbody>
        </table>

        <script>
            document.getElementById('kategori').addEventListener('change', function() {
                var kategori = this.value;

                if (kategori === 'barang') {
                    document.getElementById('tabelBarang').style.display = 'block';
                    document.getElementById('tabelPenjualan').style.display = 'none';
                } else if (kategori === 'penjualan') {
                    document.getElementById('tabelBarang').style.display = 'none';
                    document.getElementById('tabelPenjualan').style.display = 'block';
                } else {
                    document.getElementById('tabelBarang').style.display = 'block';
                    document.getElementById('tabelPenjualan').style.display = 'none';
                }
            });
        </script>
    </div>
@endsection

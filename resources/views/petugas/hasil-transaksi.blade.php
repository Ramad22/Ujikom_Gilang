@extends('petugas.layout.main')
@section('konten')
    <!--  Modal trigger button  -->
    <h5 class="text-center">Hasil Transaksi</h5>
    <div class="float-start ms-3">

        <!-- Modal Body-->
    <div class="table-responsive ms-3 mt-2 me-2">
        <table class="table table-striped table-bordered">
            <thead class="table-white">
                <th>No</th>
                <th>No Transaksi</th>
                <th>Tanggal Penjualan</th>
                <th>Total</th>
                <th>Nama Pelanggan</th>
                <th class="text-center">Invoice</th>
            </thead>
            @foreach ($penjualan as $d)
            <tbody>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->penjualan_id }}</td>
                <td>{{ \Carbon\Carbon::parse($d->tanggal_penjualan)->format('d-m-Y') }}</td>
                <td>{{ number_format($d->total, 0, ',', '.') }}</td>
                <td>{{ $d->pelanggan ? $d->pelanggan->nama_pelanggan: '-' }}</td>
                <td class="text-center"> <a href="{{ route('cetak',  $d->penjualan_id) }}" class="btn btn-light text-secondary">Print</a></td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

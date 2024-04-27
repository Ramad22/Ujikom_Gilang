@extends('petugas.layout.main')
@section('konten')
    <!--  Modal trigger button  -->
    <h5 class="text-center">Laporan</h5>
    <div class="float-start ms-3">

        <!-- Modal Body-->
        <div class="mx-0 mb-2">
            <form action="{{ route('filter') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="">Start date</label>
                    <input type="date" class="form-control w-100 " name="start_date">
                </div>
                <div class="col-2">
                    <label for="">End date</label>
                    <input type="date" class="form-control w-100 " name="end_date">
                    {{-- <button class="btn btn-info btn-sm">Filter</button> --}}
                </div>
                <div class="col mt-4">
                    <button class="btn btn-info text-white" type="submit">Filter</button>
                </div>
                <div class="col mt-4">
                </div>
            </div>
        </form>
        </div>
    </div>
    <div class="table-responsive ms-3 mt-2 me-2">
        <table class="table table-striped table-bordered">
            <thead class="table-white">
                <th>No</th>
                <th>Nama Produk</th>
                <th>stok_masuk</th>
                <th>stok_keluar</th>
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
        {{-- {{ $laporan->links('pagination::bootstrap-5') }} --}}

    </div>
@endsection


@extends('admin.layout.main')
@section('konten')
<div class="row">
    <div class="col-3">
        <div class="card ms-3">
            <div class="card-body">
               <h4 class=""><a href="admin.petugas"><i class="fa-regular fa-user" style="font-size: 3rem"></a></i><span class="mx-3 text-center">Petugas {{ $petugas }}</span></h4>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card ms-3">
            <div class="card-body">
               <h4 class=""><a href="admin.member"><i class="fa-regular fa-circle-user" style="font-size: 3rem"></a></i><span class="mx-3 text-center">Member {{ $member }}</span></h4>
            </div>
        </div>
    </div>
    {{-- <div class="col-3">
        <div class="card">
            <div class="card-body">
                <h4 class=""><a href="admin.produk"><i class="fa-brands fa-product-hunt" style="font-size: 3rem"></a></i><span class="mx-3 text-center">Produk {{ $produk }}</span></h4>
             </div>
        </div>
    </div> --}}
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <h4 class=""><a href="admin.laporan"><i class="fa-solid fa-shop" style="font-size: 3rem"></a></i><span class="mx-3 text-center">Transaksi {{ $transaksi }}</span></h4>
             </div>
        </div>
    </div>
</div>


@endsection

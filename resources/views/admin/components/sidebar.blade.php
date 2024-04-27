<div class="min-vh-100 bg-primary me-0" style="width: 17%;" id="sidebar">
    <h5 class="text-center text-white fs-5 my-4">Toko Abadi</h5>
    <ul class="nav nav-aktif flex-column">
        <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/admin.dashboard" class="nav-link {{ \Route::is('admin.dashboard') ? 'active': '' }}"><i class="fa fa-house text-white ms-3"></i><span class="text-white ms-3 d-none d-sm-inline ">Dashboard</span></a>
            </li>

        </div>
        <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/admin.petugas" class="nav-link {{ \Route::is('admin.petugas') ? 'active': '' }}"><i class="fa fa-user text-white ms-3"></i><span class="text-white ms-3 d-none d-sm-inline ">Petugas</span></a>
            </li>

        </div>
        <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/admin.member" class="nav-link {{ \Route::is('admin.member') ? 'active': '' }}"><i class="fa-regular fa-circle-user text-white ms-3"></i><span class="text-white ms-3 d-none d-sm-inline ">Member</span></a>
            </li>

        </div>
        <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/admin.produk" class="nav-link {{ \Route::is('admin.produk') ? 'active': '' }}"><i class="fa-brands fa-product-hunt text-white ms-3"></i><span class="text-white ms-3 d-none d-sm-inline ">Produk</span></a>
            </li>

        </div>
        <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/admin.diskon" class="nav-link {{ \Route::is('admin.diskon') ? 'active': '' }}"><i class="fa-brands fa-7 text-white ms-3"></i><span class="text-white ms-3 d-none d-sm-inline ">Diskon</span></a>
            </li>

        </div>

        {{-- <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/admin.transaksi" class="nav-link {{ \Route::is('admin.transaksi') ? 'active': '' }}"><i class="fa-solid fa-shop text-white ms-3"></i><span class="text-white ms-3">Transaksi</span></a>
            </li>

        </div> --}}
        <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/admin.laporan" class="nav-link {{ \Route::is('admin.laporan') ? 'active': '' }}"><i class="fa-solid fa-file text-white ms-3"></i><span class="text-white ms-3 d-none d-sm-inline ">Laporan</span></a>
            </li>

        </div>

    </ul>
</div>

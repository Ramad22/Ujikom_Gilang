<div class="min-vh-100 bg-info me-0" style="width: 17%;" id="sidebar">
    <h5 class="text-center text-white fs-5 my-4">Toko Abadi</h5>
    <ul class="nav nav-aktif flex-column">
        <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/petugas.dashboard" class="nav-link {{ \Route::is('petugas.dashboard') ? 'active': '' }}"><i class="fa fa-house text-white ms-3"></i><span class="text-white ms-3 d-none d-sm-inline ">Dashboard</span></a>
            </li>

        </div>
        <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/petugas.member" class="nav-link {{ \Route::is('petugas.member') ? 'active': '' }}"><i class="fa-regular fa-circle-user text-white ms-3"></i><span class="text-white ms-3 d-none d-sm-inline ">Member</span></a>
            </li>

        </div>
        <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/petugas.produk" class="nav-link {{ \Route::is('petugas.produk') ? 'active': '' }}"><i class="fa-brands fa-product-hunt text-white ms-3"></i><span class="text-white ms-3 d-none d-sm-inline ">Produk</span></a>
            </li>

        </div>
        <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/petugas.transaksi" class="nav-link {{ \Route::is('petugas.transaksi') ? 'active': '' }}"><i class="fa-solid fa-shop text-white ms-3"></i><span class="text-white ms-3 d-none d-sm-inline ">Transaksi</span></a>
            </li>

        </div>
        <div class="my-2 mx-2">
            <li class="nav-item">
                <a href="/petugas.laporan" class="nav-link {{ \Route::is('petugas.laporan') ? 'active': '' }}"><i class="fa-solid fa-file text-white ms-3"></i><span class="text-white ms-3 d-none d-sm-inline ">Laporan</span></a>
            </li>

        </div>
    </ul>
</div>

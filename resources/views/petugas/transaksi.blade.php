@extends('petugas.layout.main')
@section('konten')

    <div style="max-width: 100%" class="container shadow ms-6">
        <div class="row">
            <div class="col">
                <form action="{{ route('addKeranjang') }}" method="POST">
                    @csrf
                    <div class="mb-2 mt-3">
                        <label for="NamaPetugas">Nama Petugas :</label>
                        <input type="text" class="form-control w-50" placeholder="" value="{{ auth()->user()->name }}"
                            id="NamaPetugas" autocomplete="off">
                    </div>
                    {{--  <div class="mb-2">
                    <label for="PenjualanID">Transaksi Ke :</label>
                    <input type="text" class="form-control w-50" placeholder=".." name="PenjualanID" id="DetailID" autocomplete="off" >
                </div>  --}}
                    <div class="mb-2">
                        <label for="NamaProduk">Nama Barang :</label>
                        <select class="form-select my-1 w-75" name="produk_id" id="NamaProduk" onchange="updateSubtotal()"
                            required>
                            <option value="" selected disabled>Pilih Barang</option>
                            @foreach ($produk as $p)
                                <option value="{{ $p->id }}" data-harga="{{ $p->harga }}"
                                    data-stok="{{ $p->stok }}" data-diskon="{{ $p->diskon }}">{{ $p->id }} - {{ $p->nama_produk }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <div class="col me-3">
                            <label for="JumlahProduk">Qty :</label>
                            <input type="number" class="form-control w-25" placeholder=".." name="jumlah_produk"
                                min="1" id="JumlahProduk" oninput="updateSubtotal(); checkStock();">
                        </div>
                        <small id="stok_message" class="text-danger"></small>
                    </div>
                    <script>
                        function checkStock() {
                            var selectedOption = $('#NamaProduk option:selected');
                            var requestedQuantity = parseInt($('#JumlahProduk').val());
                            var availableStock = parseInt(selectedOption.data('stok'));
                            var bayarButton = $('#pembayaran')

                            if (requestedQuantity > availableStock) {
                                $('#stok_message').text('qty melebihi stok yang tersedia');
                                bayarButton.prop('disabled', true);
                            } else {
                                $('#stok_message').text('');
                                bayarButton.prop('disabled', false);
                            }
                        }
                    </script>

                    <div class="mb-2">
                        <label>Sub-total (Rp) :</label>
                        <input type="number" class="form-control mb-3 w-50" name="subtotal" id="subtotal"
                            placeholder="..." readonly>
                    </div>
                    <div class="my-2 d-grid">
                        <button style="background-color: #30F2C6; width: 200%;"
                            class="btn text-white mx-1" id="pembayaran" type="submit"><i
                                class="fa-solid fa-cart-shopping me-2 text-white "></i>Tambah Produk</button>
                    </div>
                </form>
            </div>
            <div class="col">
                <form action="{{ route('addBayar') }}" method="POST">
                    @csrf

                    <div class="mb-2 mt-3">
                        <label class="">Nama Pelanggan :</label>
                        <select class="form-select w-50" name="pelanggan_id" id="pelanggan">
                            <option value="">-</option>
                            @foreach ($member as $m)
                                <option value="{{ $m->id }}">{{ $m->nama_pelanggan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Diskon :</label>
                        <input style="background-color: azure" type="text" class  ="form-control w-25" id="diskon"
                            placeholder=".." name="diskon" readonly>
                            @foreach ($diskon as $item)
                            <small id="{{ $item->minimal_diskon  }}_minimalDiskon" class="text-secondary">diskon 2% setiap pembelanjaan > Rp  {{ $item->minimal_diskon }}</small>
                            @endforeach

                    </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="col me-4 mx-0 my-1">
                    <label>Total :</label>
                    <input style="height: 80%" type="text" class="form-control w-100" name="total" id="total"
                    value="{{ number_format($total, 0, '.', '.') }}" placeholder="..." readonly>
                </div>
                <div class="col me-4 mx-3 my-1">
                    <label>Bayar :</label>
                    <input style="height: 80%" type="text" class="form-control w-100 harga-input" id="bayar"
                        name="bayar" placeholder="..." oninput="updateKembalian()">
                </div>
                <div class="col me-4 mx-3 my-1">
                    <label>Kembalian :</label>
                    <input style="height: 80%" style="background-color: azure" type="number" class="form-control w-100"
                        name="kembalian" id="kembalian" placeholder="..." readonly>
                </div>
            </div>
            <div class="d-flex justify-content-end my-3">
                <button style="background-color: deepskyblue; width: 11%;" class="btn text-white"
                    type="submit" id="buy">Bayar</button>
                <a href="http://127.0.0.1:8000/petugas.transaksi" style="background-color: navy; width: 11%;"
                    class="btn text-white ms-4 me-5">Clear</a>
            </div>
            </form>

        </div>
    </div>

    <div class="table-responsive mx-3">
        <a href="/petugas.hasil-transaksi" class="btn btn-sm my-3"><i class="fa-solid fa-square-poll-horizontal"></i> Hasil Transaksi</a>
        <table class="table table-bordered table-striped my-3">
            <thead class="table-white">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->produk->nama_produk }}</td>
                    <td>{{ $d->jumlah_produk }}</td>
                    <td class="subtotal">{{number_format($d->subtotal, 0, ',', '.') }}</td>

                    <td class="text-center">
                        <form action="{{ route('deleteDetail', $d->detail_id)}}" method="GET">
                            @csrf
                            <button class="btn" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--  <button style="background-color: yellow; margin-left: 90%;" class="btn my-2"><i class="fa-solid fa-print"></i>
        Cetak</button>  --}}
    </div>
    <script>
        function updateSubtotal() {
            var selectedOption = document.getElementById("NamaProduk").options[document.getElementById("NamaProduk")
                .selectedIndex];
            var hargaProduk = parseFloat(selectedOption.getAttribute('data-harga'));
            var jumlahProduk = parseFloat(document.getElementById("JumlahProduk").value);
            var diskon = parseFloat(selectedOption.getAttribute('data-diskon'));

            // Tampilkan diskon di input diskon
            document.getElementById("diskon").value = diskon ? diskon + "%" : "0%";

            // Hitung subtotal berdasarkan diskon
            var subtotal = hargaProduk * jumlahProduk;
            if (diskon) {
                var potongan = (subtotal * diskon) / 100;
                subtotal -= potongan;
            }
            var pelangganID = document.getElementById("pelanggan").value;

            if (pelangganID !== "") { // Jika pelanggan dipilih
                // Tambahkan diskon 2% jika subtotal lebih besar atau sama dengan 100000
                var minimalDiskon = parseFloat("{{ $item->minimal_diskon }}");
                if (subtotal >= minimalDiskon) {
                    var diskon = subtotal * 0.05;
                    subtotal -= diskon;
                }
            }

            // Tampilkan subtotal di input field dengan format ribuan
            document.getElementById("subtotal").value = subtotal.toLocaleString('id-ID', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });

            {{--  document.getElementById("total").value = subtotal.toLocaleString('id-ID', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
         });  --}}
        }

        function updateKembalian() {
            var total = parseFloat(document.getElementById("total").value.replace(/\D/g, ''));
            var bayar = parseFloat(document.getElementById("bayar").value.replace(/\D/g, ''));
            var kembalian = bayar - total; // Perbaikan urutan pengurangan

            // Tampilkan kembalian di input field
            document.getElementById("kembalian").value = kembalian.toLocaleString('id-ID', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });

            var btn = document.getElementById('buy')
            if(total > bayar){
                btn.disabled = true;
            }else{
                btn.disabled = false;
            }
        }
    </script>
@endsection
 
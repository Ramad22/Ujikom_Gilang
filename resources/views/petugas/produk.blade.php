@extends('petugas.layout.main')
@section('konten')
    <!--  Modal trigger button  -->
    <h5 class="text-center">Manage Produk</h5>
    <div class="float-start ms-3">
        {{-- <button type="" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#modalId">
            Tambah
        </button> --}}

        <!-- Modal Body-->
        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Modal title
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('addProduk') }}" method="post">
                            @csrf
                            <div class="my-2 mx-0">
                                <label for="nama_produk">Nama Produk</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                        placeholder="Nama Produk">
                                </div>
                            </div>
                            <div class="my-2 mx-0">
                                <label for="harga">Harga</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control harga-input" id="" name="harga"
                                        placeholder="Harga">
                                </div>
                            </div>
                            <div class="my-2 mx-0">
                                <label for="stok">Stok</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="stok" name="stok" min="1"
                                        placeholder="stok">
                                </div>
                            </div>
                            {{-- <div class="my-2 mx-0">
                                <label for="diskon">Diskon</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="diskon" name="diskon"
                                        placeholder="Diskon">
                                </div>
                            </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive ms-3 mt-2 me-2">
        <table class="table table-striped table-bordered">
            <thead class="table-white">
                <th>No</th>
                <th class="text-center">Nama Produk</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Diskon</th>
                {{-- <th class="text-center">Aksi</th> --}}
            </thead>
            <tbody>
                @forelse ($produk as $p)
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $p->nama_produk }}</td>
                    <td class="text-center">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td class="text-center">{{ $p->stok }}</td>
                    <td class="text-center">{{ $p->diskon ? $p->diskon . '%' : '-' }}</td>
                    {{-- <td class="d-flex justify-content-center">
                        <button class="btn btn-light" data-bs-toggle="modal"
                            data-bs-target="#editMember{{ $p->id }}"><i class="fa fa-pen"></i></button>
                        <form action="{{ route('deleteProduk', $p->id) }}" method="get"
                            onsubmit = "return confirm ('apakah anda yakin aakn menghapus?')"">
                            <button class="btn btn-light"><i class="fa fa-trash"></i></button>

                        </form>


                        <div class="modal fade" id="editMember{{ $p->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Modal title
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('editProduk', $p->id) }}" method="post">
                                            @csrf
                                            <div class="my-2 mx-0">
                                                <label for="nama_produk">Nama Produk</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="nama_produk"
                                                        name="nama_produk" placeholder="Nama Produk"
                                                        value="{{ $p->nama_produk }}">
                                                </div>
                                            </div>
                                            <div class="my-2 mx-0">
                                                <label for="alamat">Harga</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control titik" id="harga"
                                                        name="harga" placeholder="Harga" value="{{ $p->harga }}">
                                                </div>
                                            </div>
                                            <div class="my-2 mx-0">
                                                <label for="stok">Stok</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="stok"
                                                        name="stok" min="1" placeholder="stok"
                                                        value="{{ $p->stok }}">
                                                </div>
                                            </div>
                                            <div class="my-2 mx-0">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="diskon"
                                                        name="diskon" placeholder="Diskon" value="{{ $p->diskon }}">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </td> --}}
            </tbody>
        @empty

        </table>
        {{ $produk->links('pagination::bootstrap-5') }}

        <center>
            <div class="alert alert-light" role="alert">
                Data Kosong
            </div>
        </center>
        @endforelse
    </div>
@endsection
                                                {{-- <label for="diskon">Diskon</label> --}}

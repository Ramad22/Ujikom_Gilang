@extends('admin.layout.main')
@section('konten')
    <!--  Modal trigger button  -->
    <h5 class="text-center">Manage Petugas</h5>
    <div class="float-start ms-3">
        <button type="" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#modalId">
            Tambah
        </button>

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
                        <form action="{{ route('addPetugas') }}" method="post">
                            @csrf
                            <div class="my-2 mx-0">
                                <label for="nama_produk">Nama petugas</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="nama_produk" name="name"
                                        placeholder="Name">
                                        @error('name')
                                            <div class="small text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="my-2 mx-0">
                                <label for="alamat">Username</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="harga" name="username"
                                        placeholder="Username">
                                        @error('username')
                                        <div class="small text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2 mx-0">
                                <label for="stok">Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror" id="stok" name="password"
                                        placeholder="Password">
                                        @error('password')
                                        <div class="small text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2 mx-0">
                                <label for="stok">Konfirmasi Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror" id="stok" name="password_confirmation"    placeholder="Password">
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
    </div>
    <div class="table-responsive ms-3 mt-2 me-2">
        <table class="table table-striped table-bordered">
            <thead class="table-white">
                <th>No</th>
                <th class="text-center">Nama Petugas</th>
                <th class="text-center">username</th>
                <th class="text-center">Dibuat</th>
                <th class="text-center">Aksi</th>
            </thead>
            <tbody>
                @foreach ($petugas as $p)
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $p->name }}</td>
                    <td class="text-center">{{ $p->username }}</td>
                    <td class="text-center">{{ $p->created_at->diffForHumans() }}</td>
                    <td class="d-flex justify-content-center">
                        <button class="btn btn-light" data-bs-toggle="modal"
                            data-bs-target="#editMember{{ $p->id }}"><i class="fa fa-pen"></i></button>
                            <form action="{{ route('deletePetugas', $p->id) }}" method="get" onsubmit = "return confirm ('apakah anda yakin aakn menghapus?')"">
                        <button class="btn btn-light"><i class="fa fa-trash"></i></button>
                        {{-- <a href="{{ route('deleteMember', $p->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a> --}}

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
                                        <form action="{{ route('editPetugas', $p->id) }}" method="post">
                                            @csrf
                                            <div class="my-2 mx-0">
                                                <label for="nama_produk">Nama petugas</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama_produk" name="name"
                                                        placeholder="Name" value="{{ $p->name }}">
                                                    @error('name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="my-2 mx-0">
                                                <label for="alamat">Username</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control  @error('username') is-invalid @enderror" id="harga" name="username"
                                                        placeholder="Username"  value="{{ $p->username }}">
                                                        @error('username')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="my-2 mx-0">
                                                <label for="stok">New Password</label>
                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" id="stok" name="password"  value="{{ substr( $p->password,0, 8) }}  placeholder="Password">
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

                    </td>
            </tbody>
            @endforeach
        </table>
        {{ $petugas->links('pagination::bootstrap-5') }}

    </div>
@endsection

@extends('petugas.layout.main')
@section('konten')
    <!--  Modal trigger button  -->
    <h5 class="text-center">Manage Member</h5>
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
                        <form action="{{ route('addMember') }}" method="post">
                            @csrf
                            <div class="my-2 mx-0">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                                        placeholder="Nama Pelanggan">
                                </div>
                            </div>
                            <div class="my-2 mx-0">
                                <label for="alamat">Alamat</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="alamat">
                                </div>
                            </div>
                            <div class="my-2 mx-0">
                                <label for="no_wa">Number Wa</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="no_wa" name="no_hp"
                                        placeholder="Number wa">
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
                <th class="text-center">Nama Pelanggan</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">No Wa</th>
                {{-- <th class="text-center">Aksi</th> --}}
            </thead>
            <tbody>
                @foreach ($pelanggan as $p)
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $p->nama_pelanggan }}</td>
                    <td class="text-center">{{ $p->alamat }}</td>
                    <td class="text-center">{{ $p->no_hp }}</td>
                    {{-- <td class="d-flex justify-content-center">
                        <button class="btn btn-light" data-bs-toggle="modal"
                            data-bs-target="#editMember{{ $p->id }}"><i class="fa fa-pen"></i></button>
                            <form action="{{ route('deleteMember', $p->id) }}" method="get" onsubmit = "return confirm ('apakah anda yakin aakn menghapus?')"">
                        <button class="btn btn-light"><i class="fa fa-trash"></i></button> --}}
                        {{-- <a href="{{ route('deleteMember', $p->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a> --}}

                    {{-- </form>

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
                                        <form action="{{ route('editMember', $p->id) }}" method="post">
                                            @csrf
                                            <div class="my-2 mx-0">
                                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="nama_pelanggan"
                                                        name="nama_pelanggan" value="{{ $p->nama_pelanggan }}"
                                                        placeholder="Nama Pelanggan">
                                                </div>
                                            </div>
                                            <div class="my-2 mx-0">
                                                <label for="alamat">Alamat</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="alamat"
                                                        name="alamat" placeholder="alamat" value="{{ $p->alamat }}">
                                                </div>
                                            </div>
                                            <div class="my-2 mx-0">
                                                <label for="no_wa">Number Wa</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="no_wa"
                                                        name="no_hp" placeholder="Number wa"
                                                        value="{{ $p->no_hp }}">
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
            @endforeach
        </table>
    </div>
@endsection

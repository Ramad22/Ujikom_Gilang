<style>
    body {
        background: rgb(99, 39, 120)
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <script src="{{ asset('assets/js/bundle.js') }}"></script>


    <title>Profile</title>
    <style>
    </style>
</head>

<body>
    @include('sweetalert::alert')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">Admin Kasir</span><span class="text-black-50"></span><span> </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    @foreach ($user as $p)
                        @if ($loop->first)
                            <form action="{{ route('editPetugas', $p->id) }}" method="POST">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Name</label><input type="text"
                                            class="form-control" name="name" value="{{ $p->name }}"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Username</label><input type="text"
                                            class="form-control" name="username" placeholder="enter phone number"
                                            value="{{ $p->username }}"></div>
                                    <div class="col-md-12"><label class="labels">Role</label><input
                                            style="text-transform: capitalize;" type="text" class="form-control"
                                            placeholder="enter address line 1" value="{{ $p->role }}" readonly>
                                    </div>
                                    <div class="col-md-12"><label class="labels">Password</label><input type="text"
                                            class="form-control" name="password" placeholder="enter address line 2"
                                            value="{{ $p->password }}"></div>
                                </div>
                        @endif
                    @endforeach

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                            Profile</button></div>
                    {{-- <div class="mt-5 "><a href="{{ route('admin.dashboard') }}"
                            class="btn btn-info profile-button" type="button">Back</a></div> --}}
                    </form>
            </div>
            </form>
            <div class="col-md-4">
                {{-- <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
    </div>

</body>

</html>

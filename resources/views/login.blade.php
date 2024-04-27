<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <script src="{{ asset('assets/js/bundle.js') }}"></script>


    <title>Login | Kasir</title>
    <style>
        body{
            background-color: #00A7C3;
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')

    <div class="d-flex justify-content-center">
        <div class="card col-md-4 mt-5">
            <h4 class="text-center fs-bold my-4">Login</h4>
            <small class="text-secondary text-center">Please login to your account</small>
           @error('error')
           <small class="text-danger">{{$message}}</small>
           @enderror
            <form action="{{ route('prosesLogin') }}" method="POST">
             @csrf
            <div class="my-3 mx-3">
                <label for="username" class="fs-bold">Username</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter your username">
                    @error('username')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="my-3 mx-3">
                <label for="password" class="fs-bold">Password</label>
                <div class="col-sm-12">
                    <input type="password"  class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="my-3 mx-3">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label for="remember" class="fs-bold form-check-label">Remember me</label>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-info btn-block text-white mt-3 mb-5" type="submit">Login</button>
            </div>
        </form>
        </div>
    </div>

</body>
</html>

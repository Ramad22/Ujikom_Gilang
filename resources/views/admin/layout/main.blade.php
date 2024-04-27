<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kasir</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/abi.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.css') }}">
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.js') }}"></script>



</head>
<body>
    @include('sweetalert::alert')

    <div class="d-flex">
        @include('admin.components.sidebar')
        <div class="d-flex flex-column w-100">
            @include('admin.components.navbar')
            @yield('konten')
        </div>
    </div>

    <script>
        new DataTable('#table');
    </script>
     {{-- <script>
        $('.table').DataTable()
     </script> --}}


    <script src="{{ asset('assets/js/abi.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
</body>
</html>

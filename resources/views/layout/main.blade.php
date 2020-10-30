<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/pacejs/pace.css') }}">
    <script src="{{ url('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <title>{{ $title }}</title>
</head>

<body>
    @if (session('users'))
        @include('layout.navbar')
    @endif
   
    <div class="container mt-5 mb-5">
        <div class="view-data">
            @yield('content')
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('assets/vendor/pacejs/pace.js') }}"></script>
    <script src="{{ url('modjs/Main.js') }}"></script>

</body>

</html>
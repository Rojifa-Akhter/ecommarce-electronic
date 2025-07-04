<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | A&R Store</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.jpg') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background-color: #000;
            /* black */
            color: white;
        }

        .footer {
            background-color: #111;
            color: #aaa;
            padding: 20px 0;
            text-align: center;
            margin-top: 100px;
        }
    </style>
</head>

<body>

    {{-- Header/Navbar --}}
    @include('components.admin.header')

    {{-- Sidebar --}}
    @include('components.admin.sidebar')

    {{-- Page Content --}}
    <main class="container mt-5">
        @yield('content')
    </main>




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Page-specific scripts --}}
    @stack('scripts')

</body>

</html>

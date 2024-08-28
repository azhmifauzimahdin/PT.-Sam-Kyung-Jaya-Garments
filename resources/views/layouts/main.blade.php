<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="row m-0">
        <div class="col-2 min-vh-100 bg-secondary p-3">
            <div>
                <a href="{{ route('products.index') }}" class="text-white">Barang</a>
            </div>
            <div>
                <a href="{{ route('receptions.index') }}" class="text-white">Penerimaan Barang</a>
            </div>
        </div>
        <div class="col-10 p-0">
            <div class="bg-primary p-3">Navbar</div>
            <div class="p-3">
                @yield('container')
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('home/home.css')}}">
    <link rel="stylesheet" href="{{ asset('navbar/navbar.css')}}">
    <link rel="stylesheet" href="{{ asset('home/hero.css')}}">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <!-- navbar -->
        @include('components/navbar/navbar')

        <!-- hero -->
        @include('components/home/hero')
    </div>
</body>
<script src={{ asset('navbar/navbar.js')}}></script>
</html>


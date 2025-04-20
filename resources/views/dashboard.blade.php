<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('navbar/navbar.css')}}">
    <link rel="stylesheet" href="{{ asset('dashboard/dashboard.css')}}">
    <title>Dashboard</title>
</head>
<body>
    @include('components/navbar/navbar')
    <div class="container">
        <div class="content">
            @if(session('user_email'))
                <h1>Welcome, {{ session('user_email') }}</h1>
                <p>Here is your dashboard.</p>
                <p>Here you can manage your account, view your activity, and more.</p>
                <p>Use the navigation bar to access different sections of the dashboard.</p>
            @else
                <h1>Welcome to the Dashboard</h1>
                <p>Please log in to access your account.</p>
                <p>If you don't have an account, please register.</p>
                <p>Use the navigation bar to access different sections of the dashboard.</p>
            @endif
        </div>
    </div>
    <div class="logout-container">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
    </form>
</div>
</body>
<script src="{{ asset('navbar/navbar.js')}}"></script>
</html>

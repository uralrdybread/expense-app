<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Document</title>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-item">
            <a href="{{ route('welcome') }}">Home</a> <!-- Link to the Home page -->
        </div>
        <div class="navbar-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="navbar-item">
            <a href="{{ route('expenses.index') }}">Expenses</a>
        </div>
        <div class="navbar-item">
            <a href="{{ route('expenses.create') }}">Create</a>
        </div>
        <div class="navbar-item">
            <a href="{{ route('profile.edit') }}">Profile</a>
        </div>
        <div class="navbar-item">
            <a href="{{ route('expenses.create') }}">Logout</a>
        </div>
        <!-- Add more navbar items as needed -->
    </div>

    <!-- Page Content -->
    <div class="content">
        {{$slot}} <!-- Your page content goes here -->
    </div>
</body>
</html>
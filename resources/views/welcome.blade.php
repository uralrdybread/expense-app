<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Welcome</title>
</head>
<body>
<div class="navbar">
    <div class="navbar-item">
        <a href="{{ route('welcome') }}">Home</a>
    </div>

    <!-- Show these links only if the user is authenticated -->
    @auth
        <div class="navbar-item">
            <a href="{{ route('expenses.index') }}">Expenses</a>
        </div>
        <div class="navbar-item">
            <a href="{{ route('expenses.create') }}">Create</a>
        </div>
    @endauth

    <!-- Always show these links -->
    <div class="navbar-item">
        <a href="{{ route('login') }}">Login</a>
    </div>
    <div class="navbar-item">
        <a href="{{ route('register') }}">Register</a>
    </div>

    <!-- Show logout button if the user is authenticated -->
    @auth
        <div class="navbar-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    @endauth
</div>

    <!-- Page Content -->
    <div class="content">
        <div class="welcome-message">
            <h1>Welcome to Your Expense Management System</h1>
            <p>Manage your business expenses efficiently with our expense management system.</p>
            <p>What constitutes a business expense:</p>
            <ul>
                <li>Expenses incurred for business purposes</li>
                <li>Items or services necessary for business operations</li>
            </ul>
            <p>Expenses over a certain amount may require approval ahead of time.</p>
        </div>
    </div>
</body>
</html>
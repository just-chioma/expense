<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
  <div class="main-container">
    <div class="sidebar">
      <h2>Admin Panel</h2>

      <a href="{{ route('admin.dashboard') }}">Dashboard</a>
      <a href="{{ route('admin.users.index') }}">Users</a>
      <a href="{{ route('admin.expenses.index') }}">Expenses</a>
      <a href="">Settings</a>
      <form action="{{ route('admin.logout') }}" method="POST">
        @csrf

        <button type="submit" class="logout-btn">
          Logout
        </button>
      </form>
    </div>

    <div class="body-container">
      <div class="header">
        <h1>Admin Dashboard</h1>
      </div>

      <div class="sub-container">
        @yield('content')
      </div>
</body>
</html>

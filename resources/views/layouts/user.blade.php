<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/user.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
  <div class="main-container">
    <div class="sidebar">
      <h2>Expense Manager</h2>

      <a href="{{ route('user.dashboard') }}">Dashboard</a>
      <a href="{{ route('expenses.index') }}">My Expenses</a>
      <a href="{{ route('expenses.create') }}">Add Expense</a>
      <a href="{{ route('profile.show') }}">My Profile</a>
      <form action="{{ route('user.logout') }}" method="POST">
        @csrf

        <button type="submit" class="logout-btn">
          Logout
        </button>
      </form>
    </div>

    <div class="body-container">
      <div class="header">
        <h1>Expense Manager</h1>
      </div>

      <div class="sub-container">
        @yield('content')
      </div>
</body>
</html>

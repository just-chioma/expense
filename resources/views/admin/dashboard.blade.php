<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
@extends('layouts.admin')
@section('content')
        <div class="cards">

          <div class="card">
            <h3>Total Users</h3>
            <p>{{$totalUsers}}</p>
          </div>

          <div class="card">
            <h3>Total Expenses</h3>
            <p>{{$totalExpenses}}</p>
          </div>

          <div class="card">
            <h3>Total Amount Spent</h3>
            <p>₦{{ number_format($totalAmount, 2) }}</p>
          </div>
        </div>
    </div>
  </div>
@endsection
</body>
</html>

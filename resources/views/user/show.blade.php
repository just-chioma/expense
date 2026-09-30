<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show User</title>
  <style>
  .form-container {
    width: 520px;
    margin: 60px auto;
    font-family: Arial;
  }
  .sub-container {
    background: white;
    padding: 25px;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
  }
  .title {
    margin-bottom: 20px;
  }
  .login-link {
    display: inline-block;
    margin: 10px 0px;
    font-weight: 500;
    text-decoration: none;
    color: #0d6efd;
  }
  .logout-button {
    width: 100%;
    padding: 10px;
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: bold;
    cursor: pointer;
  }
  .update-button {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background: #0d6efd;
    color: white;
    border: none;
    margin-bottom: 8px;
    border-radius: 10px;
    font-weight: bold;
    cursor: pointer;
  }
  </style>
</head>
<body>
@if(session('success'))
  <p style="color: green;">
  {{ session('success') }}
  </p> 
@endif
@extends('layouts.user')
  @section('content')
  <div class="form-container">
    <div class="sub-container">
  
    <h2 class="title">User Profile</h2>
      <p><strong>User's ID: </strong>{{ $user->id }}</p>
      <p><strong> User's name:</strong> {{ $user->name }}</p>
      <p><strong> User's email:</strong> {{ $user->email }}</p>
        
      <p><a href="{{ route('expenses.create') }}" class="login-link">Login Expenses</a></p>

       <a href="{{ route('user.edit', $user->id) }}" style="text-decoration: none;">
         <button type="submit" class="update-button">Update Profile</button>
       </a>

        <form action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">Log out</button>
        </form>
    </div>
   @endsection
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    .form-container {
      border: 3px solid black;
      width: 400px;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0 0 0 0.1);
      vertical-align: top;
      margin-right: 10px;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid black;
      border-radius: 3px;
      margin-bottom: 15px;
    }

    button {
      width: 100%;
      border: none;
      background-color: blue;
      color: white;
      font-size: 16px;
      border-radius: 10px;
      padding: 5px 5px 5px 5px;
    }

  </style>
</head>
<body>
@if(session('success'))
  <p style="color: green;">
  {{ session('success') }}
  </p>
@endif

  <div class="form-container">
    <h2>Register</h2>
    <form action="{{ route('user.store') }}" method="POST">
      @csrf
      <input name="name" type="text" placeholder="Name">
      <input name="email" type="text" placeholder="Email">
      <input name="password" type="password" placeholder="Password">
      <button type="submit">Register</button>
    </form>
  </div>

  <p>
    Already have an account?
    <a href="{{ route('login.store') }}">Login</a>
  </p>
</body>
</html>

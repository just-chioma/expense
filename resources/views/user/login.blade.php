<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    .form-container {
      border: 3px solid black;
      width: 400px;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0 0 0 0.1);
      display: inline-block;
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
  <div class="form-container">
    <h2>Login</h2>
    <form action="{{ route('login.store') }}" method="POST">
      @csrf
      <input name="login_email" type="text" placeholder="Email">
      <input name="login_password" type="password" placeholder="Password">
      <button type="submit">Log in</button>
    </form>
  </div>
  <p>
    No account yet?
    <a href="{{ route('user.create') }}">Register</a>
  </p>
</body>
</html>

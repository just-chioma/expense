<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
  <style>
   .form-container {
      width: 400px;
      border-radius: 10px;
      padding: 20px;
      margin: auto;
      background: white;
  }
   input {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    margin-top:20px;
  }
  button {
    background-color: black;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top:20px;
  }
 .page-title {
    text-align: center;
    color: #333;
    margin-top: 20px;
    font-size: 35px;
  }
  </style>
</head>
<body>
@if(session('success'))
  <p style="color: green;">
  {{ session('success') }}
  </p>
@endif

  <h2 class="page-title">Edit Profile</h2>
  <div class="form-container">
    <form action="{{ route('user.update', $user->id) }}" method="POST"> 
      @csrf
      @method('PUT')
      <input type="text" name="name" value="{{ old('name', $user->name) }}" required><br><br>

      <input type="text" name="email" value="{{ old('email', $user->email) }}" required><br><br>

      <button type="submit">Update</button>
    </form>
  </div>

</body>
</html>
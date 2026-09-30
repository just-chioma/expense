@extends('layouts.admin')
@section('content')
<style>
    .form-container {
      width: 400px;
      border-radius: 10px;
      padding: 20px;
      margin: auto;
      background: white;
  }
   input {
    width: 390px;
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
  }
</style>
<div class="form-container">
  <h2>Create User</h2>
  <h3>New User</h3>
  <form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required><br><br>

    <input type="text" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type='Submit'>Create User</button>
  </form>
</div>
@endsection

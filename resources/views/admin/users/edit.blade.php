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
    margin-top:20px;
  }
 .page-title {
    text-align: center;
    color: #333;
    margin-top: 20px;
    font-size: 35px;
 }
  </style>

  <h2 class="page-title">Edit User</h2>
  <div class="form-container">
    <form action="{{ route('admin.users.update', $users->id) }}" Method="POst">
      @csrf
      @method('PUT')
      <input type="text" name="name" value="{{ old('name', $users->name) }}" required><br><br>

      <input type="text" name="email" value="{{ old('email', $users->email)}}"><br><br>

      <button type="submit">Update</button>
    </form>
  </div>
@endsection
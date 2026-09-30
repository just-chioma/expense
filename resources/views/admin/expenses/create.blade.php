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

  input,
  textarea,
  select {
    width: 390px;
    padding: 10px;
    margin-top: 10px;
    margin-top: 20px;
  }

  button {
    background-color: black;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  button:hover {
    opacity: 0.8;
  }

  .page-title {
    text-align: center;
    color: #333;
    margin-top: 20px;
    font-size: 35px;
  }
</style>
<h2 class="page-title">Create Expenses</h2>
<div class="form-container">
  <form action="{{ route('admin.expenses.store')}}" method="POST">
    <input type="text" name="title" placeholder="Title" required><br><br>

    <input type="number" name="amount" placeholder="Amount" required><br><br>

    <select name="category" required>
      <option value="">Select Category</option>
      <option value="food">Food</option>
      <option value="Transport">Transport</option>
      <option value="shopping">Shopping</option>
      <option value="data">Data</option>
      <option value="bills">Bills</option>
      <option value="other">Other</option>
    </select><br><br>

    <textarea name="description" id="description" placeholder="Description" required></textarea><br><br>

    <select name="user_id" required>
      <option value="">Select a User</option>

      @foreach($users as $user)
      <option value="{{ $user->id }}">
        {{ $user->name }}
      </option>
      @endforeach
    </select><br><br>

    <button type="submit">Add Expenses</button>
  </form>
</div>


@endsection

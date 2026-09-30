@extends('layouts.user')
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
    width: 100%;
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
    margin-top: 20px;
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
<h1 class="page-title">Enter Expenses</h1>
<div class="form-container">
  <form action="{{ route('expenses.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title"><br><br>

    <input type="number" name="amount" placeholder="Amount"><br><br>

    <select name="category" required>
      <option value="">Select Category</option>
      <option value="food">Food</option>
      <option value="Transport">Transport</option>
      <option value="shopping">Shopping</option>
      <option value="data">Data</option>
      <option value="bills">Bills</option>
      <option value="other">Other</option>
    </select><br><br>

    <textarea name="description" id="description" placeholder="Description"></textarea><br><br>

    <button type="submit">Save Expenses</button>

    <p><a href="{{ route('expenses.index') }}">View Expenses</a></p>
  </form>
</div>
@endsection

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
    width: 395px;
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
<h2 class="page-title">Edit Experience</h2>
<div class="form-container">
  <form action="{{ route('admin.expenses.update', $expense->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{old('title', $expense->title) }}" required><br><br>
    <input type="number" name="amount" value="{{ old('amount', $expense->amount)}}" required><br><br>

    <select name="category" required>
      <option value="food">
        {{ $expense->category =='food'?'selected':''}}
        Food
      </option>

      <option value="transport">
        {{ $expense->category =='transport'?'selected':''}}
        Transport
      </option>

      <option value="Shopping">
        {{ $expense->category =='Shopping'?'selected':''}}
        Shopping
      </option>

      <option value="data">
        {{ $expense->category =='data'?'selected':''}}
        Data
      </option>

      <option value="bills">
        {{ $expense->category =='bills'?'selected':''}}
        Bills
      </option>


      <option value="other">
        {{ $expense->category =='others'?'selected':''}}
        Other
      </option>
    </select><br><br>
    <textarea name="description" required>
    {{ old('description', $expense->description) }}
    </textarea><br><br>
    <button type="submit">Update</button>
  </form>
</div>
@endsection

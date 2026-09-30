<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Expenses</title>
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
  button:hover {
    opacity: 0.8;
  }
  </style>
</head>
<body>
  <h1>Edit Expenses</h1>
  <div class="form-container">
    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
      @csrf
      @method('PUT')
        <input type="text" name="title" value="{{ old('title', $expense->title) }}" required><br><br>

        <input type="amount" name="amount" value="{{ old('amount', $expense->amount)}}" required><br><br>

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

        <textarea name="description">
        {{ old('description', $expense->description) }}
        </textarea><br><br>
     <button type="submit">Update</button>
   </form>
  </div>

</body>
</html>

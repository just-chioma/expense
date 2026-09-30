@extends('layouts.admin')
@section('content')
<style>
  th {
    padding: 10px;

  }

  td {
    padding: 10px;

  }

  .header-tr {
    background-color: gray;
    color: black;
  }

  .body-tr {
    text-align: center;
    border-bottom: 1px solid #ddd;
  }

  h1 {
    text-align: center;
  }

</style>

<h1>All Expenses</h1>
<a href="{{ route('admin.expenses.create') }}">Create Expenses</a>
<table border="1" cellpadding="10" style="border-collapse: collapse; margin-top: 10px; width: 100%;">
  <tr class="header-tr">
    <th>ID</th>
    <th>User</th>
    <th>Title</th>
    <th>Amount</th>
    <th>Date</th>
    <th>Action</th>
  </tr>

  <tbody>
    @foreach($expenses as $expense)
    <tr class="body-tr">
      <td>{{ $expense->id }}</td>
      <td>{{ $expense->user_id }}</td>
      <td>{{ $expense->title }}</td>
      <td>₦{{ number_format($expense->amount, 2) }}</td>
      <td>{{ $expense->created_at->format('d M Y') }}</td>
      <td>
        <a href="{{ route('admin.expenses.edit', $expense->id) }}" style="text-decoration: none;" display="inline;">
          <button>Edit</button>
        </a>
        <form action="{{ route('admin.expenses.destroy', $expense->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Are you sure you want to delete this expense?')">
            Delete
          </button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection

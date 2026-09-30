@extends('layouts.user')
@section('content')

@if(session('success'))
<p style="color: green;">
  {{ session('success') }}
</p>
@endif

<h1 class="page-title">My Expenses</h1>
<h2 class="sub-title">Total Expenses: ₦{{ number_format($total) }}</h2>

<table border="1" cellpadding="10" style="border-collapse: collapse; margin-top: 10px;">

  <tr>
    <th>Title</th>
    <th>Amount</th>
    <th>Category</th>
    <th>Description</th>
    <th>Action</th>

  </tr>

  @foreach($expenses as $expense)

  <tr>
    <td>{{ $expense->title }}</td>

    <td>₦{{ $expense->amount }}</td>

    <td>{{$expense->category}}</td>

    <td>{{ $expense->description }}</td>

    <td>
      <a href="{{ route('expenses.edit', $expense->id)}}" class="action-link">
        <button type="button">Edit</button>
      </a>

      <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

<a href="{{ route('user.dashboard') }}" style="text-decoration: none;">
  <button class="back-button">Back to Dashboard</button>
</a>
<a href="{{ route('expenses.create') }}" style="text-decoration: none;">
  <button class="back"> Add Expenses</button>
</a>
@endsection

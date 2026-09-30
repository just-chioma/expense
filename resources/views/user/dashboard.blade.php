@extends('layouts.user')
@section('content')
<h2>Welcome, {{ auth()->user()->name }} 👋</h2>
<p>Here's a summary of your expenses</p>
<div class="cards">

  <div class="card">
    <h3>Total Expenses</h3>
    <p>{{ $totalExpenses }}</p>
  </div>

  <div class="card">
    <h3>Total Amount Spent</h3>
    <p>₦{{ number_format($totalAmount, 2) }}</p>
  </div>

  <div class="card">
    <h3>Amount Spent This Month</h3>
    <p>₦{{ number_format($thisMonthAmount, 2) }}</p>
  </div>
</div>

<h3>Quick Actions</h3>
<div class="quick-actions">

  <a href="{{ route('expenses.create') }}" class="action-card">
    <h4>
      <i class="fa-solid fa-plus" aria-hidden="true"></i>
      Add Expense
    </h4>
    <p>Record a new expense</p>
  </a>

  <a href="{{ route('expenses.index') }}" class="action-card">
    <h4>
      <i class="fa-solid fa-file-lines"></i>
      View Expenses
    </h4>
    <p>See all your expenses</p>
  </a>
</div>
@endsection

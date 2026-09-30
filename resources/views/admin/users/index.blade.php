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
<h1>All Users</h1>
<a href="{{ route('admin.users.create')}}">Create New User</a>
<table border="1" cellpadding="10" style="border-collapse: collapse; margin-top: 10px; width: 100%;">
  <tr class="header-tr">
    <th> ID </th>
    <th>Name</th>
    <th>Email</th>
    <th>Joined</th>
    <th>Action</th>
  </tr>

  <tbody>
    @foreach($users as $user)
    <tr class="body-tr">
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->created_at->format('d M Y')}}</td>

      <td>
        <div class="action-buttons">

          <a href="{{ route('admin.users.profile', $user->id) }}">
            <button type="button" class="view-btn">View</button>
          </a>

          <a href="{{ route('admin.users.edit', $user->id) }}">
            <button type="button" class="edit-btn">Edit</button>
          </a>

          <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?')">
              Delete
            </button>
          </form>

        </div>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection

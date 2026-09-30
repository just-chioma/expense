@extends('layouts.admin')

@section('content')

<style>
    .profile-container{
        max-width:900px;
        margin:auto;
        background:#fff;
        padding:30px;
        border-radius:10px;
        box-shadow:0 0 10px rgba(0,0,0,.1);
    }

    .profile-header{
        text-align:center;
        margin-bottom:30px;
    }

    .profile-img{
        width:180px;
        height:180px;
        border-radius:50%;
        object-fit:cover;
        margin-bottom:20px;
    }

    .details{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:20px;
    }

    .card{
        background:#f5f5f5;
        padding:15px;
        border-radius:8px;
    }

    .card h4{
        margin-bottom:8px;
    }

    .back-btn{
        margin-top:30px;
        background-color: black;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        padding: 15px 20px;
    }
</style>

<div class="profile-container">

    <div class="profile-header">

        @if($profile && $profile->img)
            <img src="{{ asset('storage/'.$profile->img) }}" class="profile-img">
        @else
            <img src="{{ asset('images/default-avatar.png') }}" class="profile-img">
        @endif

        <h2>{{ $user->name }}</h2>
        <p>{{ $user->email }}</p>

    </div>

    <div class="details">

        <div class="card">
            <h4>First Name</h4>
            <p>{{ $profile->first_name ?? 'Not Provided' }}</p>
        </div>

        <div class="card">
            <h4>Last Name</h4>
            <p>{{ $profile->last_name ?? 'Not Provided' }}</p>
        </div>

        <div class="card">
            <h4>Phone</h4>
            <p>{{ $profile->phone ?? 'Not Provided' }}</p>
        </div>

        <div class="card">
            <h4>Date of Birth</h4>
            <p>{{ $profile->dob ?? 'Not Provided' }}</p>
        </div>

        <div class="card">
            <h4>Address</h4>
            <p>{{ $profile->address ?? 'Not Provided' }}</p>
        </div>

        <div class="card">
            <h4>State</h4>
            <p>{{ $profile->state ?? 'Not Provided' }}</p>
        </div>

        <div class="card">
            <h4>Country</h4>
            <p>{{ $profile->country ?? 'Not Provided' }}</p>
        </div>

    </div>

    <div>
        <a href="{{ route('admin.users.index') }}">
            <button  class="back-btn">Back to Users</button>
        </a>
    </div>

</div>

@endsection
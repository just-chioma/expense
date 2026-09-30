@extends('layouts.user')

@section('content')

<div class="profile-container">

  <div class="profile-header">
    <h2>My Profile</h2>
    <p>Manage your personal information.</p>
  </div>

  <div class="profile-card">

    <div class="profile-left">

      <div class="avatar-wrapper">
        @if($profile->img)
        <img src="{{ asset('storage/'.$profile->img) }}" class="profile-img">
        @else
        <img src="{{ asset('images/default-avatar.png') }}" class="profile-img">
        @endif
      </div>

      <h3>{{ $profile->first_name }} {{ $profile->last_name }}</h3>

      <div class="email-box">
        <i class="fa-solid fa-envelope"></i>
        <span>{{ auth()->user()->email }}</span>
      </div>

      <a href="{{ route('profile.edit') }}" >
       <button class="btn-primary"> Edit Profile</button>
      </a>

    </div>

    <div class="profile-right">

      <div class="info-box">
        <label>First Name</label>
        <p>{{ $profile->first_name ?? '-' }}</p>
      </div>

      <div class="info-box">
        <label>Last Name</label>
        <p>{{ $profile->last_name ?? '-' }}</p>
      </div>

      <div class="info-box">
        <label>Phone</label>
        <p>{{ $profile->phone ?? '-' }}</p>
      </div>

      <div class="info-box">
        <label>Date of Birth</label>
        <p>{{ $profile->dob ?? '-' }}</p>
      </div>

      <div class="info-box">
        <label>Address</label>
        <p>{{ $profile->address ?? '-' }}</p>
      </div>

      <div class="info-box">
        <label>State</label>
        <p>{{ $profile->state ?? '-' }}</p>
      </div>

      <div class="info-box">
        <label>Country</label>
        <p>{{ $profile->country ?? '-' }}</p>
      </div>

    </div>

  </div>

</div>

@endsection

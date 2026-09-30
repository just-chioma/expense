@extends('layouts.user')

@section('content')

<div class="profile-container">

  <div class="profile-header">
    <h2>Edit Profile</h2>
    <p>Update your personal information.</p>
  </div>

  <div class="profile-card">

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">

      @csrf
      @method('PUT')

      <div class="image-section">

        @if($profile->img)
        <img src="{{ asset('storage/' . $profile->img) }}" alt="Profile Picture" class="profile-img">
        @else
        <img src="{{ asset('images/default-avatar.png') }}" alt="" class="profile-img">
        @endif

        <label for="img">Profile Picture</label>
        <input type="file" name="img" id="img">

      </div>

      <div class="form-grid">

        <div class="form-group">
          <label>First Name</label>
          <input type="text" name="first_name" value="{{ old('first_name', $profile->first_name) }}">
        </div>

        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="last_name" value="{{ old('last_name', $profile->last_name) }}">
        </div>

        <div class="form-group">
          <label>Phone</label>
          <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}">
        </div>

        <div class="form-group">
          <label>Date of Birth</label>
          <input type="date" name="dob" value="{{ old('dob', $profile->dob) }}">
        </div>

        <div class="form-group">
          <label>Address</label>
          <input type="text" name="address" value="{{ old('address', $profile->address) }}">
        </div>

        <div class="form-group">
          <label>State</label>
          <input type="text" name="state" value="{{ old('state', $profile->state) }}">
        </div>

        <div class="form-group">
          <label>Country</label>
          <input type="text" name="country" value="{{ old('country', $profile->country) }}">
        </div>

      </div>

      <button type="submit" class="btn-primary">
        Save Changes
      </button>

    </form>

  </div>

</div>

@endsection

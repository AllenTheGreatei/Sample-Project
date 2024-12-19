@extends('layouts/contentLayout')

@section('title', content: 'Profile Authentication')

@section('content')

        <div class="header">
            <h2>Profile</h2>
            <div>
                <button><a href="/profile">Edit Information</a></button>
                <button class="active">Edit Authentication</button>
            </div>
        </div>
        
        <div class="profile-container">
            <div class="profile-left">
                <div class="profile-picture">
                    <img src="{{ asset('img/'.$user['profile_pic'])}}" alt="Profile Picture">
                </div>
                <div class="profile-info">
                    <p><strong>Name: </strong> {{ $user['first_name'] }} {{ $user['last_name'] }}</p>
                    <p><strong>Birthdate: </strong>{{ $user['birthdate']}}</p>
                    <p><strong>Gender: </strong>{{ $user['gender']}}</p>
                    <p><strong>Email: </strong> {{ $user['email']}}</p>
                    <p><strong>Phone: </strong> {{ $user['phone']}}</p>
                    <p><strong>Address: </strong> {{ $user['address']}}</p>
                </div>
            </div>
            <div class="profile-right">
                <form id="profileForm">
                    <div class="form-group-inline">
                        <div class="input-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" value="{{ $user['username']}}">
                        </div>
                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{ $user['email']}}">
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="address">Password</label>
                        <input type="text" name="address" id="address" value="" placeholder="**********">
                    </div>
                    <button type="button" id="saveChangesBtn2" class="save-btn">Save Changes</button>
                </form>
            </div>
        </div>

        <script src="{{asset('js/profile.js')}}"></script>
@endsection
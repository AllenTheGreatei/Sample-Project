@extends('layouts/contentLayout')

@section('title', content: 'Profile')

@section('content')

        <div class="header">
            <h2>Profile</h2>
            <div>
                <button class="active">Edit Information</button>
                <button><a href="/profile_auth">Edit Authentication</a></button>
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
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" value="{{ $user['first_name']}}">
                        </div>
                        <div class="input-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" value="{{ $user['last_name']}}">
                        </div>
                    </div>
                    <div class="form-group-inline">
                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user['email']}}">
                        </div>
                        <div class="input-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ $user['phone']}}">
                        </div>
                    </div>
                    <div class="form-group-inline">
                        <div class="input-group">
                            <label for="birthdate">Birthdate</label>
                            <input type="text" name="birthdate" id="address" value="{{ $user['birthdate']}}">
                        </div>
                        <div class="input-group">
                            <label for="birthdate">Gender</label>
                            <input type="text" name="gender" id="address" value="{{ $user['gender']}}">
                        </div>
                    </div>
                    

                    <div class="input-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="{{ $user['address']}}">
                    </div>
                    {{-- <div class="input-group">
                        <label for="profile_pic">Profile Picture</label>
                        <input type="file" name="profile_pic" id="profile_pic" value="{{ $user['profile_pic']}}">
                    </div> --}}
                    <button type="button" id="saveChangesBtn" class="save-btn">Save Changes</button>
                </form>
            </div>
        </div>

        <script src="{{asset('js/profile.js')}}"></script>
@endsection
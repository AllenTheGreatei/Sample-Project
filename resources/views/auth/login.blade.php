@extends('layouts/contentLayout')

@section('title', content: 'Login')

@section('content')
    <form id="loginForm">
        <h2>Login</h2>
        <div class="form-group">
            <label for="birthdate">Email or Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required>
        </div>
        <div class="form-group">
            <label for="birthdate">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
        </div>
        <div class="form-group">
            <input type="button" id="loginBtn" value="Log In">
        </div>
        <div class="form-group">
            <label>Already have an account? <a href="/register">Register</a></label>
        </div>
    </form>

    <script src="{{asset('js/auth.js')}}"></script>
@endsection
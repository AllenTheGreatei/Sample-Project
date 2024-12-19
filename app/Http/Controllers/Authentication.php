<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Authentication extends Controller
{
    public function register(Request $request)
    {

        $formData = $request->input('formData');
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'birthdate' => 'required|string|max:255',
                'gender' => 'required|string',
                'phone' => 'required|string|size:11',
                'address' => 'required|string',
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:12',
                'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['res'=>'error','message' => $e->errors()[array_key_first($e->errors())][0]]);
        }

        
        $userImg = $request->file('profile_pic');
        $imgExtension = $userImg->getClientOriginalExtension();
        $imgName = time() . '.' . $imgExtension;

        $newUser = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'birthdate' => $request->input('birthdate'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'profile_pic' => $imgName,
        ]);

        if($newUser)
            $path = $userImg->move(public_path('img'), $imgName);
            return response()->json(['res'=>'success', 'message'=>'Registered Successfully!']);

        return response()->json(['res'=>'failed', 'message'=>'Registered Failed!']);
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        if (Auth::attempt([
            'username' =>$username,
            'password' => $password,
        ])){
            session()->put('username', $username);
            session()->put('password', $password);
            return response()->json(['res'=> 'success']);
        }

        return response()->json(['res'=> 'fail', 'message'=>'Invalid Credentials']);
    }
}

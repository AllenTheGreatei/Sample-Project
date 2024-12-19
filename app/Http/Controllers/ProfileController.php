<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('username', session('username'))->first();

        if (Hash::check(session('password'), $user->password)){
            return view('content.profile', compact('user'));
        }
    }

    public function index2()
    {
        $user = User::where('username', session('username'))->first();

        if (Hash::check(session('password'), $user->password)){
            return view('content.profile_auth', compact('user'));
        }
    }

    public function save_changes(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'birthdate' => 'required|string|max:255',
                'gender' => 'required|string',
                'phone' => 'required|string|size:11',
                'address' => 'required|string',
                // 'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['res'=>'error','message' => $th->errors()[array_key_first($th->errors())][0]]);
        }

        // $img = $request->file('profile_pic');
        // $imgExtension = $img->getClientOriginalExtension();
        // $imgName = time() . '.' . $imgExtension;

        $updateUser = User::where('username', session('username'))->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'birthdate' => $request->input('birthdate'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            // 'profile_pic' => $imgName,
        ]);

        if($updateUser)
            return response()->json(['res'=>'success']);
        return response()->json(['fail']);
    }
}

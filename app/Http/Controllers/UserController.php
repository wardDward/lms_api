<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'firsname' => 'required|max:255',
            'middlename' => 'nullable|max:255',
            'lastname' => 'required|max:255',
            'password' => 'required|confirmed|max:50',
            'email' => 'required|max:255|unique:users,email',
            "gender" => 'required|in:male,female'
        ]);

        $avatar = $request->avatar === 'male' ? 'male_dp.png' : 'woman_dp.png';

        $user = User::create([
            'firstname' => $data->firstname,
            'middlename' => $data->middlename,
            'lastname' => $data->lastname,
            'password' => $data->password,
            'email' => $data->email,
            'gender' => $data->gender,
            'avatar' => $avatar
        ]);

        return $user;
    }
}

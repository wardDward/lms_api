<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|max:255',
            'middlename' => 'nullable|max:255',
            'lastname' => 'required|max:255',
            'password' => 'required|confirmed|max:50',
            'email' => 'required|max:255|unique:users,email',
            "gender" => 'required|in:male,female',
            "role" => 'required|exists:roles,name'
        ]);

        $role = Role::where('name', $data['role'])->firstOrFail();
        // profile feature
        // $avatar = $data['gender'] === 'male' ? 'male_dp.png' : 'woman_dp.png';

        $user = User::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'gender' => $data['gender'],
            'role' => $role,
            // profile feature
            // 'avatar' => $avatar
        ]);

        return 'user';
    }
}

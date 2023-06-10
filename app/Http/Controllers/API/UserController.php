<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required',
        ]);

        $user = User::where('email',$request->email)->first();

        if(!Hash::check($request->password, $user->password)){
            return response([
                'message' => "Password is wrong"
            ]);
        }

        $token = $user->createToken('api-key')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];

    }
    public function info(Request $request)
    {
        return $request->user();
    }
}

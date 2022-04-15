<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:2', 'max:20'],
            'email' => ['required', 'email','unique:users','string'],
            'password' => ['required','confirmed','min:2','max:8']
        ]);

        $user = User::create([
           'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('new_user')->plainTextToken;

        $response = [
          'user' => $user,
          'token' => $token,
        ];

        return response()->json(['response'=>$response,'status'=>200],201);

    }

    public function login(Request $request)
    {

    }

    public function logOut(Request $request)
    {
        auth()->user()->tokens()->delete();
        return  [ 'message' => 'logged out'];
    }
}

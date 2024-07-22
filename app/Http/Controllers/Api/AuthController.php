<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function auth;
use function response;

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
        $request->validate([
            'email' => ['required', 'email','string'],
            'password' => ['required','min:2','max:8']
        ]);

        // check password
        $user  = User::where('email',$request->email)->first();

        // check password
        if(!$user || !Hash::check($request->password,$user->password)){

            return response(['message' => 'Bad Credentials'],401);
        }

        $token = $user->createToken('new_user')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response()->json(['response'=>$response,'status'=>200],201);

    }

    public function logOut(Request $request)
    {
        auth()->user()->tokens()->delete();
        return  [ 'message' => 'logged out'];
    }
}

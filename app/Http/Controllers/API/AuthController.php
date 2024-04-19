<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller

{
    //
 public function login(Request $request)
{
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $user = User::where('email', $request->input('email'))->firstOrFail();
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Chào ' . $user->name . '! Chúc an lành',
        'access_token' => $token,
        'token_type' => 'Bearerr'
    ]);
}


    public function register(Request $request){
        $validator = \Validator::make($request->all(),
        [
       'name' => 'required|string|max:255',
       'email' => 'required|string|email|max:255|unique:users',
        'role_id' => 'required|integer|in:1,2|exists:roles,id',
       'password' => 'required',

        ]);
       if($validator->fails())return response()->json($validator->errors());
            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 2,
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Chào ' . $user->name . '! Chúc an lành',
            'access_token' => $token,
            'token_type' => 'Bearerr'
        ], 200);
    }

    public function logout(){
        Auth()->user()->tokens()->delete();
       return ['message' => 'Bạn đã thoát ứng dụng và token đã xóa'];
    }
}

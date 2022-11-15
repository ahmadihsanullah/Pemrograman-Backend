<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        # menangkap inputan
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        # menginput data ke tabel user
        $user = User::create($input);

        $data = [
            'message' => 'User is created successfully',
        ];

        return response()->json($data, 200);
    }

    public function login(Request $request)
    {
        # menangkap inputan user dan validasi login
        $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        # mengambil data user (DB)
        $user = User::where('email','=', $input['email'])->first();
        
        # membandingkan input user dgn data user (DB)
        $isLoginSuccessfully = ($user  && Hash::check($input['password'], $user->password));

        if ($isLoginSuccessfully ) {
            # membuat token
            $token = $user->createToken('auth_token');

            $data = [
                'message' => 'Login Succesfully',
                'token' => $token->plainTextToken,
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Email or Password wrong'
            ];

            return response()->json($data, 401);
        }
    }
}

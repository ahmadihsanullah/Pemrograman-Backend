<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // menangkap inputan
        $input = [
            //kolom => value
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ];

        //menginsert ke table user
        $user = User::create($input);

        $data = [
            "message" => "User is created successfuly"
        ];

        //mengirim response json
        return response()->json($data, 200);
    }

    public function login(Request $request)
    {
         # menangkap inputan user
         $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        # mengambil data user (DB)
        $user = User::where('email', $input['email'])->first();

        # membandingkan input user dgn data user (DB)
        $isLoginSuccessfully = ($input['email'] == $user->email && Hash::check($input['password'], $user->password));

        if ($isLoginSuccessfully) {
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

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return response()->json([
                'result' => ['user' => $user],
                'message' => "",
                'status' => 200
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'result' => [],
                'message' => "user exists",
                'status' => 401
            ]);
        }

    }

    public function login()
    {
        $credentials = request(['email', 'password']);
        try {
            $token= auth('api')->attempt($credentials);
            if (!$token) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }

        return $this->respondWithToken($token);

    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}

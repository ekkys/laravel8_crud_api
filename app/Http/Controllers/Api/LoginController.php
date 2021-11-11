<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) { // User kosong
            return response()->json([
                'success' => false,
                'message' => 'Invalid login!',
                'data' => []
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {

            return response()->json([
                'success' => false,
                'message' => 'Invalid login!',
                'data' => []
            ]);

        }

        $token = $user->createToken($user->email)->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ]);

    }

    public function logout(Request $request)
    {
        return $request;
    }
}

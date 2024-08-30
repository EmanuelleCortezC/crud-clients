<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            return response()->json(['token' => $user->createToken('API Token')->plainTextToken], 200);
        }

        return response()->json(['error' => 'Não autorizado'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Usuário deslogado'], 401);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        // order middlewares
        $this->middleware(['auth:sanctum'])->only('index');
    }

    public function index(Request $request) {
        return [Auth::user()->toArray()];
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token', ['basic']);

            return response()->json([
                'status' => 'success',
                'token' => $token->plainTextToken,
            ]);
        }
        return response()->json(['error' => 'Invalid login credentials'], 401);
    }

    public function destroy(Request $request) {
        Auth::logout();
    }
}

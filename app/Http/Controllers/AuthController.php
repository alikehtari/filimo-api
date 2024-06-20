<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $token = $request->user()->createToken('api');
        return response()->json([
            'token'=> $token->plainTextToken 
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);
        Log::debug(print_r($credentials, 1));
        if ( ! $token) {
                return response([
                    'status' => 'error',
                    'error' => 'invalid.credentials',
                    'msg' => 'Invalid Credentials.'
                ], 400);
        }

        return response([
                'status' => 'success'
            ])
            ->header('Authorization', $token);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function user(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        return response([
                'status' => 'success',
                'data' => $user
            ]);
    }

    /**
     * @return void
     */
    public function refresh()
    {
        return response([
                'status' => 'success'
            ]);
    }

    /**
     * @return void
     */
    public function logout()
    {
        JWTAuth::invalidate();
        
        return response([
                'status' => 'success',
                'msg' => 'Logged out Successfully.'
            ], 200);
    }
}

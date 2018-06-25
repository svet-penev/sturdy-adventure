<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UsersController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::paginate(10));
    }

    public function get($id)
    {
        $user = User::find($id);
        return new UserResource($user);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => \bcrypt($request->get('password')),
        ]);
    
        return new UserResource($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);
    
        return new UserResource($user);
    }
}
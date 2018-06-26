<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UsersController extends Controller
{
    /**
     * @return void
     */
    public function index()
    {
        return UserResource::collection(User::paginate(10));
    }

    /**
     * @param [string] $id
     * @return void
     */
    public function get($id)
    {
        $user = User::find($id);
        return new UserResource($user);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => \bcrypt($request->get('password')),
        ]);
    
        return new UserResource($user);
    }

    /**
     * @param Request $request
     * @param [string] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);
    
        return new UserResource($user);
    }

    /**
     * @param Request $request
     * @param [string] $id
     * @return void
     */
    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
    
        return new UserResource($user);
    }
}
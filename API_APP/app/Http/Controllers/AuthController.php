<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Traits\HTTPResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HTTPResponses;

    public function login(LoginUserRequest $request)
    {
        $validatedData = $request->validated();
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('', "Credentials do not match", 401);
        }

        $user = User::where('email', $request->email)->first();

        // Generate an API token using Sanctum
        $token = $user->createToken('token_' . $user->email)->plainTextToken;

        // Create a user array without the "email_verified_at" field if it's null
        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];

        // Remove the "email_verified_at" field from the user data if it's null
        if ($user->email_verified_at === null) {
            unset($userData['email_verified_at']);
        }

        return $this->success([
            'user' => $userData,
            'token' => $token,
        ]);
    }



    public function register(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Generate an API token using Sanctum
        $token = $user->createToken('token_' . $user->email)->plainTextToken;

        return $this->success([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->success([
            "message" => "You have been successfully logged out"
        ]);
    }
}

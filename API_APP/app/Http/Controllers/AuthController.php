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
        // $token = $user->createToken('token_' . $user->email)->plainTextToken;
        // Generate an API token using Sanctum updated for removing serial number before token
        $token = $user->createToken('token_' . $user->email)->plainTextToken;

        // Extract only the part after "tkn_" in the token
        $token = substr($token, strpos($token, 'tkn_') + 0);

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

        // Extract the domain from the email address
        $email = $validatedData['email'];
        $domain = substr(strrchr($email, "@"), 1);

        // Check MX records for the domain
        if (!checkdnsrr($domain, "MX")) {
            return $this->error('', "Invalid email domain", 400);
        }

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Generate an API token using Sanctum
        $token = $user->createToken('token_' . $user->email)->plainTextToken;

        // Extract only the part after "tkn_" in the token
        $token = substr($token, strpos($token, 'tkn_') + 0);

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

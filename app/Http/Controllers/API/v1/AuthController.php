<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Http\Requests\IssueTokenRequest;
use Hash;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);
        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    public function token(IssueTokenRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Предоставленные учетные данные неверны.'], 401);
        }

        return response()->json(['token' => $user->createToken($request->device_name)->plainTextToken]);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credential = $request->only('email', 'password');
        if (!Auth::attempt($credential)) {
            return response()->json([
                'message' => 'Unauthorized',
                'status' => 'Failed'
            ]);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Unauthorized',
                'status' => 'Failed'
            ]);
        } else {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'Login Success',
                'status' => 'Success',
                'user' => $user,
                'access_token' => $token,
                'type_token' => 'Bearer'
            ]);
        }
    }
}

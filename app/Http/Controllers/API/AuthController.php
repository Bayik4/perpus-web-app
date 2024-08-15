<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


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

        $user = User::with('gender')->where('email', $request->email)->first();
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

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout Success',
            'status' => 'Success'
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        // return response()->json($request->all(), 200);

        DB::beginTransaction();
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender_id' => $request->genderId
            ]);

            DB::commit();
            return response()->json([
                'message' => 'Register user success',
                'status' => 'Success'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Register user failed',
                'status' => 'Failed'
            ]);
        }
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'alamat' => ['required'],
            'gender_id' => ['required'],
            'umur' => ['required'],
            'no_telp' => ['required']
        ]);

        // $profile = Image::make(public_path('storage/img'), $request->foto_user);

        // if ($request->foto_user) {
        //     $profile = 'user' . $request->id_user . '.' . $fotoUser->extension();

        //     $request->sampul->move(public_path('storage/img'), $profile);
        // } else {
        //     $profile = $request->sampulLama;
        // }

        // return response()->json($request->all(), 200);

        // $profile = base64_encode($request->foto_user);

        DB::beginTransaction();

        try {
            if ($request->foto_user) {
                User::where('id', $request->id_user)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'foto_user' => $request->foto_user,
                    'alamat' => $request->alamat,
                    'gender_id' => $request->gender_id,
                    'umur' => $request->umur,
                    'no_telp' => $request->no_telp
                ]);
                DB::commit();
                return response()->json($request->all(), 200);
            } else {
                User::where('id', $request->id_user)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    'gender_id' => $request->gender_id,
                    'umur' => $request->umur,
                    'no_telp' => $request->no_telp
                ]);
                DB::commit();
                return response()->json($request->all(), 200);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['oke' => 'ora'], 200);
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required|min:8',
                'device_name' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendAsJson($validator->errors(), 400);
            }

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return $this->sendAsJson(['message' => 'User not found'], 404);
            }

            if (!$user || !Hash::check($request->password, $user->password)) {
                return $this->sendAsJson(['message' => 'Incorrect Password'], 404);
            }

            $user['token'] = $user->createToken($request->device_name, [toSlug($user->role)])->plainTextToken;

            return $this->sendAsJson($user, 200);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }

    public function register(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
            ]);

            if ($validator->fails()) {
                return $this->sendAsJson($validator->errors(), 400);
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = 'Customer';
            $user->password = $request->password;
            $user->save();

            return $this->sendAsJson($user, 201);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }

    public function logout(Request $request)
    {
        try {

            $request->user()->currentAccessToken()->delete();
            return $this->sendAsJson(['message' => 'You have successfully logged out!'], 200);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }
}

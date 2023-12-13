<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            toastr()->error('User not exist!');
            return redirect()->back();
        }

        if ($user->role != 'Customer') {
            toastr()->warning('Access denied');
            return redirect()->back();
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            toastr()->success('Logged In');
            return redirect('/');
        }

        toastr()->error('Invalid password!');
        return redirect()->back();
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 'Customer';
        $user->save();

        toastr()->success('Account registered!');
        return redirect('login');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}

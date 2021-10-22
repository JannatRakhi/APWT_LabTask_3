<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class LoginController extends Controller
{
    public function show()
    {
        return view('pages.login');
    }
    public function loginValidation(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'role' => 'required',
                'password' => [
                    'required',
                    'string',
                    'min:5',             // must be at least 5 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                ],
            ],

            [
                'password.regex' => 'Invalid password formate!',
                'password.required' => 'Password is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Invalid email address!',
                'role.required' => 'Select your user role!'
            ]
        );
        $role = $request->role;
        if ($role == 'admin') {
            $check = Admin::where([
                ['email', '=', $request->email],
                ['password', '=', $request->password]
            ])->first();
            if ($check) {

               
                session(['email' => $check->email, 'id' => $check->id, 'name' => $check->name, 'role' => $check->role, 'phone' => $check->phone, 'address' => $check->address]);
                return view('pages.dashboard');
    
            }

            $request->session()->flash('database-error', 'User Not Found!');
            return redirect('login');
        } else {
            $check = User::where([
                ['email', '=', $request->email],
                ['password', '=', $request->password]
            ])->first();

            if ($check) {
                session(['id' => $check->id, 'email' => $check->email, 'name' => $check->name, 'role' => $check->role, 'phone' => $check->phone]);
                return view('pages.dashboard');
            }
            $request->session()->flash('database-error', 'User Not Found!');
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect('/');
    }
}

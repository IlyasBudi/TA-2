<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\staff;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class AuthController extends Controller
{
    //
    public function login()
    {
        #membuka page login
        return view('auth.login');
    }

    public function penyewaregister()
    {
        #membuka page register untuk penyewa
        return view('auth.penyewaregister');
    }

    public function staffregister()
    {
        #membuka page register untuk staff
        return view('auth.staffregister');
    }

    public function dopenyewaregister(Request $request)
    {
        #validasi data penyewa
        $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'string', 'email', 'max:100', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'phone_number' => ['required'],
        'address' => ['required', 'string', 'max:65535'],
        ]);

        #membuat data penyewa
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        Auth::login($user);

        return redirect('/login');
    }

    public function dostaffregister(Request $request)
    {
        #validasi data staff
        $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'string', 'email', 'max:100', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'phone_number' => ['required'],
        'address' => ['required', 'string', 'max:65535'],
        ]);

        #membuat data staff
        $staff = Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        Auth::login($staff);

        return redirect('/login');
    }

    public function doLogin(Request $request)
    {
        #validasi data login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }

        if (Auth::guard('staff')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/staff/dashboard');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

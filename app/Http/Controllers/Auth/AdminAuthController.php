<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminRegisterRequest;

class AdminAuthController extends Controller
{

    public function showAdminRegisterForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('auth.admin.admin-register');
        }
    }
    public function showAdminLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('auth.admin.admin-login');
        }
    }

    public function adminLogin(AdminLoginRequest $request)
    {
        if (auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('admin.login');
        } else {
            return redirect()->back()->withError('Invalid Email or Password');
        }
    }

    public function adminRegister(AdminRegisterRequest $request)
    {
        if (
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ])
        ) {
            if (Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                return redirect()->route('admin.dashboard');
            }
        } else {

            return view('auth.admin.admin-login');
        }
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TeacherLoginRequest;
use App\Http\Requests\TeacherRegisterRequest;

class TeacherAuthController extends Controller
{
    public function showTeacherRegisterForm()
    {
        if (Auth::guard('teacher')->check()) {
            return redirect()->route('teacher.dashboard');
        } else {
            return view('auth.teacher.teacher-register');
        }
    }

    public function showTeacherLoginForm()
    {
        if (Auth::guard('teacher')->check()) {
            return redirect()->route('teacher.dashboard');
        } else {
            return view('auth.teacher.teacher-login');
        }
    }

    public function teacherRegister(TeacherRegisterRequest $request)
    {
        if (
            Teacher::create([
                'first_name' => $request->lastname,
                'last_name' => $request->firstname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ])
        ) {
            if (Auth::guard('teacher')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                return redirect()->route('teacher.dashboard');
            }
        } else {

            return redirect()->back()->withError('Invalid Inputs');
        }
    }

    public function teacherLogin(TeacherLoginRequest $request)
    {
        if (Auth::guard('teacher')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('teacher.login');
        } else {
            return redirect()->back()->withError('Invalid Email or Password');
        }
    }

    public function teacherLogout(Request $request)
    {
        Auth::guard('teacher')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

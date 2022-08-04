<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StudentLoginRequest;
use App\Http\Requests\StudentRegisterRequest;

class StudentAuthController extends Controller
{
    public function showStudentRegisterForm()
    {
        if (Auth::guard('student')->check()) {
            return redirect()->route('student.dashboard');
        } else {
            return view('auth.student.student-register');
        }
    }


    public function showStudentLoginForm()
    {
        if (Auth::guard('student')->check()) {
            return redirect()->route('student.dashboard');
        } else {
            return view('auth.student.student-login');
        }
    }

    public function studentRegister(Request $request) //doesnt allow for StudentRegisterRequest to be inputted
    {
        if (
            Student::create([
                'first_name' => $request->lastname,
                'last_name' => $request->firstname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ])
        ) {
            if (Auth::guard('student')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                return redirect()->route('student.dashboard');
            }
        } else {

            return view('auth.student.student-login');
        }
    }

    public function studentLogin(StudentLoginRequest $request)
    {
        if (auth()->guard('student')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('student.login');
        } else {
            return redirect()->back()->withError('Invalid Email or Password');
        }
    }

    public function studentLogout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

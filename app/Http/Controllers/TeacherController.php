<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Student;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function showTeacherDashboard()
    {
        $students = Student::all();
        
        return view('auth/teacher/teacher-dashboard', compact('students'));
    }

    public function index()
    {
        
    }

    public function create()
    {
        //
    }

    public function store(StoreTeacherRequest $request)
    {
        //
    }

    public function show(Teacher $teacher)
    {
        //
    }

    public function edit(Teacher $teacher)
    {
        //
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }

    public function destroy(Teacher $teacher)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function showStudentDashboard()
    {
        // $currentStudent = Student::all()->where('student_id' == Auth::id());
        // $files = $currentStudent->files->all();
        return view('auth/student/student-dashboard');
        // compact('files')
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreStudentRequest $request)
    {
        //
    }

    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student)
    {
        //
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    public function destroy(Student $student)
    {
        //
    }
}

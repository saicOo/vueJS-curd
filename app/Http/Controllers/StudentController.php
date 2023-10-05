<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return response()->json([
            'students'=> $students
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:students',
            'course'=> 'required',
            'phone'=> 'required',
        ]);

        $student = Student::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'course'=> $request->course,
            'phone'=> $request->phone,
        ]);
        
        return response()->json([
            'message'=> 'added successfuly'
        ],200);

    }

    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student)
    {
        //
    }

    public function update(Request $request, Student $student)
    {
        //
    }

    public function destroy(Student $student)
    {
        //
    }
}

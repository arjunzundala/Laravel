<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Student::orderBy("id", "DESC")->get();
        return view('students', compact('students'));
    }

    public function AddStudents(Request $req)
    {
        $Students = new Student;
        $Students->name = $req->name;
        $Students->mobile = $req->mobile;
        $Students->email = $req->email;
        $Students->city = $req->city;
        $Students->save();
        return response()->json($Students);
    }
}

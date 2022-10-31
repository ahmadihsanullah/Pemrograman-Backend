<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $data = [
            "message" => "Get All Students",
            "data" => $students
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $input = [
            "nama" => $request->input('nama'),
            "nim" => $request->input('nim'),
            "email" => $request->input('email'),
            "jurusan" => $request->input('jurusan')
        ];

        $student = Student::create($input);

        $data = [
            "message" => "Student is created succesfully",
            "data" => $input
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        
        $student->nama = $request->input('nama') ?? $student->nama;
        $student->nim = $request->input('nim')?? $student->nim;
        $student->email = $request->input('email')??$student->email;
        $student->jurusan = $request->input('jurusan')??$student->jurusan;
        
        $student->save();
        $data = [
            "message" => "Student is updated succesfully",
            "data" => $student
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        $data = [
            "message" => "Student is deleted succesfully",
        ];
        return response()->json($data, 200);
    }
}

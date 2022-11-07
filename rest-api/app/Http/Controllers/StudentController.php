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

    public function show($id)
    {
        $student = Student::find($id);

        if($student)
        {
            $data = [
                "message" => "Get detail student",
                "data" => $student
            ];

            return response()->json($data, 200);
        }else{
            $data =[
                "message" => "Student not found"
            ];

            return response()->json($data, 404);
        }
    }

    public function store(Request $request)
    {
        $input = [
            "nama" => $request->input('nama'),
            "nim" => $request->input('nim'),
            "email" => $request->input('email'),
            "jurusan" => $request->input('jurusan')
        ];
        if($input['nama'] == null || $input['nim'] == null || $input['email'] == null || $input['jurusan'] == null || trim($input["nama"]) == "" || trim($input["nim"]) == "" || trim($input["email"] == "" || trim($input["jurusan"]) == "" ))
        {
            $data = [
                "message" => "the field cannot blank",
            ];
    
            return response()->json($data, 200);
        }else{
            
            $student = Student::create($input);

            $data = [
                "message" => "Student is created succesfully",
                "data" => $input
            ];

            return response()->json($data, 201);
        
        }
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if ($student)
        {

            $input = [
                "nama" => $request->input('nama') ?? $student->nama,
                "nim" => $request->input('nim')?? $student->nim,
                "email" => $request->input('email')??$student->email,
                "email" => $request->input('jurusan')??$student->jurusan
                ];
    
            $student->save($input);
            $data = [
                "message" => "Student is updated succesfully",
                "data" => $student
                ];
    
            return response()->json($data, 200);
        }else{
            $data = [
                "message" => "Student not found",
            ];
    
            return response()->json($data, 404);
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if($student)
        {
            $student->delete();
            $data = [
                "message" => "Student is deleted succesfully",
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                "message" => "Student not found",
            ];
            return response()->json($data, 404);
        }
    }
}

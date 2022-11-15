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

    // menampilkan data secara detail dengan no id
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
        // membuat validasi

        $validateData = $request->validate([
            // kolom => 'rules|rules'
            "nama" => "required",
            "nim" => "numeric|required",
            "email" => "email|required",
            "jurusan" => "required"
        ]);            
        
        // menggunakan Student untuk insert data
        $student = Student::create($validateData);

        $data = [
                "message" => "Student is created succesfully",
                "data" => $student
            ];
        // mengembalikan data (json) dan response code jika berhasil 201 
        return response()->json($data, 201);
        
        
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

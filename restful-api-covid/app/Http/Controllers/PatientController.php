<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Get All Resource
    public function index()
    {
        // menggunakan model Patient untuk select data
        $patients = Patient::all();
        //mengecek dan menampilkan keseluruhan data pasien
        if(sizeof($patients) != 0){
            
            $data = [
                "message" => "Get All Resource",
                'data' => $patients
            ];

            //mengirim data (json) dan status kode 200
            return response()->json($data, 200);
        }else{

            $data = [
                "message" => "Data is empty"
            ];
    
            //mengirim data (json) dan status kode 200
            return response()->json($data, 200 );
        }
    }

    // Add Resource
    public function store(Request $request)
    {
        //membuat validasi
        $input = $request->validate([
            //kolom => rule|rules
            "name" => 'required',
            "phone" => 'string|required',
            "address" => 'required',
            "status" => 'string|required',
            "in_date_at" => 'date|required',
            "out_date_at" => 'date|required'
        ]);

        //menggunakan model Patient untuk insert data
        $patient = Patient::create($input); 
        $data = [
                "message" => "Resource is added successfully",
                'data' => $patient
            ];
            //mengembalikan data json dan status code 201
        return response()->json($data, 201);
        
    }

    //Get Detail Resource
    public function show($id)
    {
        // cari id pasien yang ingin didapatkan
        $patient = Patient::find($id);

        if($patient){
            $data = [
                "message" => "Get Detail Resource",
                'data' => $patient
            ];
            // mengembalikan data json dengan status kode 200
            return response()->json($data, 200);
        }else{
            $data = [
                "message" => "Resource not found"
            ];
            
            // mengembalikan data json dengan status kode 404
            return response()->json($data, 404);
        }   


    }

    // Edit Resource
    public function update(Request $request, $id)
    {
        //cari id patient yang ingin diupdate
        $patient = Patient::find($id);
        //menangkap data request yang ingin di edit
        if($patient){
            $input = [
                "name" => $request->name ?? $patient->name,
                "phone" => $request->phone ?? $patient->phone,
                "address" => $request->address ?? $patient->address,
                "status" => $request->status ?? $patient->status,
                "in_date_at" => $request->in_date_at ?? $patient->in_date_at,
                "out_date_at" => $request->out_date_at ?? $patient->out_date_at
            ];
    
            $patient->update($input);
    
            $data = [
                "message" => "Resource is update successfully",
                "data" => $patient
            ];
            // mengembalikan data json dengan status kode 200
            return response()->json($data, 200);
        }else{
            $data = [
                "message" => "Resource not found"
            ];
            // mengembalikan data json dengan status kode 404
            return response()->json($data, 404);
        }
        
    }
    // Delete Resource
    public function destroy($id)
    {
        # cari data patient yg ingin dihapus
        $patient = Patient::find($id);

        if ($patient) {
            # hapus data patient
            $patient->delete();

            $data = [
                'message' => 'Resource is delete successfully',
            ];

            # mengembalikan data json status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found',
            ];

            # mengembalikan data json status code 404
            return response()->json($data, 404);
        }
    }

    // Search Resource by name
    //masih terdapat error saat menghadle jika inputannya tidak ada diDB
    public function search($name)
    {
        
        $patient = Patient::where('name', 'like',"%{$name}%")->get();   
        if(sizeof($patient) != 0 ){
            $data = [
                "message" => "Get searched resource",
                "data" => $patient
            ];
            // mengembalikan data json dengan status kode 200
            return response()->json($data,200);
        }else{
            $data = [
                "message" => "Resource not found"
            ];
            // mengembalikan data json dengan status kode 400
            return response()->json($data,400);
        }
    }

    // Get Positive Resource
    public function positive()
    {
        $patient = Patient::where('status','positive')->get();

            $data = [
                "message" => "Get positive resource",
                "total" => sizeof($patient),
                "data" => $patient
            ];
            // mengembalikan data json dengan status kode 200
            return response()->json($data, 200);
    }

    // Get Recovered Resource
    public function recovered()
    {
        $patient = Patient::where('status','recovered')->get();

            $data = [
                "message" => "Get recovered resource",
                "total" => sizeof($patient),
                "data" => $patient
            ];
            // mengembalikan data json dengan status kode 200
            return response()->json($data, 200);
    }
    
    // Get Dead Resource
    public function dead()
    {
        $patient = Patient::where('status','dead')->get();

            $data = [
                "message" => "Get dead resource",
                "total" => sizeof($patient),
                "data" => $patient
            ];
            // mengembalikan data json dengan status kode 200
            return response()->json($data, 200);
    }
    
}

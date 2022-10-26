<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private array $animals = ['kucing','ayam','ikan'];
    public function index()
    {
        echo "Menampilkan data animal";
        echo "</br>";
        foreach($this->animals as $animal){
            echo "- $animal";
            echo "</br>";
        }
    }

    public function store(Request $request)
    {
        echo "Menambahkan hewan baru  </br>";
        $this->animals[] = $request->nama;
        $this->index();
    }

    public function update(Request $request, $id)
    {
        echo "Mengubah data hewan id $id </br>";
        $this->animals[$id] = $request->nama;
        $this->index();
    }

    public function destroy($id)
    {
        echo "menghapus data hewan id $id </br>";
        unset($this->animals[$id]);
        $this->index();
    }
}

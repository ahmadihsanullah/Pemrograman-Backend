<?php

# membuat class Animal
class Animal
{
    # property animals

    # method constructor - mengisi data awal
    # parameter: data hewan (array)

    public array $animals = [];
    public function __construct(array $data = [])
    {
        $this->animals = $data;
    }

    # method index - menampilkan data animals
    public function index()
    {
        foreach ($this->animals as $key => $animal) {
            echo "index-$key = $animal" . PHP_EOL;
        }
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($data)
    {
        # gunakan method array_push untuk menambahkan data baru
        array_push($this->animals, $data);
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $data)
    {
        $this->animals[$index] = $data;
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index)
    {
        unset($this->animals[$index]);
    }
}

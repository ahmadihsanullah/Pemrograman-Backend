<?php

# membuat class Animal
class Animal
{

    public array $animals = [];
    public function __construct(array $data = [])
    {
        $this->animals = $data;
    }

    public function index()
    {
        foreach ($this->animals as $key => $animal) {
            echo "index-$key = $animal" . PHP_EOL;
        }
    }

    public function store($data)
    {
        array_push($this->animals, $data);
    }

    public function update($index, $data)
    {
        $this->animals[$index] = $data;
    }

    public function destroy($index)
    {
        unset($this->animals[$index]);
    }
}

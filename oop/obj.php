<?php

require_once "Animal.php";

$objek = new Animal(['kucing', 'anjing', 'gajah']);
$objek->store('burung');
$objek->index();
echo("--------------".PHP_EOL);
$objek->update(1, "domba");
$objek->index();
echo("--------------".PHP_EOL);
$objek->destroy(2);
$objek->index();
echo("--------------".PHP_EOL);
$objek->store('cicak');
$objek->index();
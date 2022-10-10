<?php

require_once "Animal.php";

$objek = new Animal(['kucing', 'anjing', 'gajah']);
$objek->store('burung');
$objek->index();
$objek->update(1, "domba");
$objek->index();
$objek->destroy(2);
$objek->index();

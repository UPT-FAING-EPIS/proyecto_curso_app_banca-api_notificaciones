<?php

require 'flight/Flight.php';

Flight::route('GET /Cnotfound', function () {
    Flight::json("Cliente no encontrado");
});

Flight::route('POST /Cnotfound', function () {
    $Cnotfound=(Flight::request()->data->Cnotfound);

    if($Cnotfound=="CNF")
    {
        Flight::json("Cliente no encontrado");
    }
    else
    {
        Flight::json("ERROR");
    }
});

Flight::start();

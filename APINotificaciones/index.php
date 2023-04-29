<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=bdapi','root',''));

Flight::route('GET /Cnotfound', function () {
    Flight::json("Cliente no encontrado");
});

Flight::route('POST /Cnotfound', function () {
    $buscar=(Flight::request()->data->buscar);
    $tipo_msg=(Flight::request()->data->tipo_msg);
    $sentencia=Flight::db()->prepare("SELECT * FROM tbcliente WHERE id='$buscar'");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    if((count($datos)!=0) && ($tipo_msg=="SF"))
    {
        $sql="INSERT INTO tbregistro (idcliente,fecha,tipo) VALUES('$buscar',NOW(),'$tipo_msg')";
        $sentencia1=Flight::db()->prepare($sql);
        $sentencia1->execute();
        
    }
    else if((count($datos)!=0) && ($tipo_msg=="RF"))
    {
        $sql="INSERT INTO tbregistro (idcliente,fecha,tipo) VALUES('$buscar',NOW(),'$tipo_msg')";
        $sentencia1=Flight::db()->prepare($sql);
        $sentencia1->execute();
    }
    else
    {
        Flight::json("Cliente no encontrado");  
    }
});

Flight::start();

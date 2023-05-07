<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;db_notificaciones=test','root',''));

// muestra los datos
Flight::route('GET /notificacion', function () {
    $sentencia = Flight::db()->prepare("SELECT * FROM 'tb_notify'");
    $sentencia->execute();
    $datos = $sentencia->fetchAll();
    Flight::json($datos);
});

// almacena datos
Flight::route('POST /notificacion', function () {
    
    $mensaje = (Flight::request()->data->mensaje);
    $destino = (Flight::request()->data->destino);
    
    $sql = "INSERT INTO tb_notify (nombres, apellidos) VALUES (?,?)";

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$mensaje);
    $sentencia->bindParam(2,$destino);
    $sentencia->execute();

    Flight::jsonp(["Notificacion agregada"]);
});

Flight::start();

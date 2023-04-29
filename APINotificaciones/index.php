<?php

require 'flight/Flight.php';

Flight::route('/cnotfound', function () {
    echo 'Cliente no encontrado';
});

Flight::route('/deposito', function () {
    echo 'Usted a depositado';
});

Flight::start();

<?php

require 'flight/Flight.php';
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=seleccion','root',''));
Flight::route('GET /', function () {
    $sentencia = Flight::db()->prepare("SELECT profesion,curp,rfc,nombre,appaterno,apmaterno,estado,delegacion,localidad,colonia,codigopostal,fechanacimiento,sexo,correoelectronico from datospersonales where datosActualizados = :datosActualizados ");
    $sentencia->execute(array(
        ':datosActualizados'=>3
    ));
        $datos = $sentencia->fetchAll();

        Flight::json($datos);
});
Flight::start();



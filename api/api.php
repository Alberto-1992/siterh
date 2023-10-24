<?php
require 'flight/Flight.php';

Flight::route('/', function ()  {
    echo 'creacion de api rest';
});

Flight::start();
?>
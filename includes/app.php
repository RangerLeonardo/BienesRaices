<?php

    require "funciones.php";
    require "config/databases.php";
    require __DIR__."/../vendor/autoload.php";


    //conectarlos a la base de datos
    $db=conectarDB();
    use Model\ActiveRecord;
    ActiveRecord::setDB($db);









?>
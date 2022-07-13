<?php

function conectarDB() : mysqli{
    $db = new mysqli("localhost", "root", "Root", "bienes_raices");
    $db->set_charset('utf8');
    
    if(!$db){
        echo "ERROR EN LA CONEXIÓN";
        exit;
    }
    return $db;



}
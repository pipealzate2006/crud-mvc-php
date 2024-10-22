<?php
$connection;

function openConnection()
{
    global $connection;
    $bd_host = "localhost";
    $bd_user = "root";
    $bd_password = "";
    $bd_name = "crud_ventas";

    try {
        $connection = new mysqli($bd_host, $bd_user, $bd_password, $bd_name);
    } catch(Throwable $th) {
        echo "no se pudo crear la conexion, $th";
    }
}


function closeConnection() {
    global $connection;
    $connection->close();
}

<?php
include("./../../connection/connection.php");

function createUser($name, $lastName, $cellphone, $email, $password, $rolId)
{
    openConnection();
    global $connection;

    $query = "INSERT INTO usuarios (nombres, apellidos, celular, correo, password, idroles) VALUES ('$name', '$lastName', '$cellphone', '$email', '$password', $rolId)";

    if ($connection->query($query) === true) {
        closeConnection();
        return true;
    } else {
        closeConnection();
        return "We had a mistake to insert the data: " . $connection->error;
    }
}

function getAllUsers()
{
    openConnection();
    global $connection;
    $query = "SELECT * FROM usuarios INNER JOIN roles ON usuarios.idroles = roles.idroles";
    $result = $connection->query($query);

    $users = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    closeConnection();
    return $users;
}

function deleteUser($id)
{
    openConnection();
    global $connection;

    $query = "DELETE FROM usuarios WHERE idusuarios = $id";

    if ($connection->query($query) === true) {
        closeConnection();
        return true;
    } else {
        echo "<script>alert('The user exists in sales table: ')</script>" . $connection->error;
    }
}

function updateUser($id, $name, $lastName, $cellphone, $email, $rolId)
{
    openConnection();
    global $connection;

    $query = "UPDATE usuarios SET nombres = '$name', apellidos = '$lastName', celular = '$cellphone', correo = '$email', idroles = $rolId WHERE idusuarios = $id";

    if ($connection->query($query) === true) {
        closeConnection();
        return true;
    } else {
        closeConnection();
        return "We had a mistake to update the user: " . $connection->error;
    }
}

function getOneUser($id)
{
    openConnection();
    global $connection;

    $query = "SELECT * FROM usuarios 
              INNER JOIN roles ON usuarios.idroles = roles.idroles 
              WHERE idusuarios = '$id' OR nombres LIKE '%$id%' 
              OR apellidos LIKE '%$id%' OR celular LIKE '%$id%' 
              OR correo LIKE '%$id%'";
    $result = $connection->query($query);

    $users = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    closeConnection();
    return $users;
}
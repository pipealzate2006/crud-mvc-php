<?php
include("./../../connection/connection.php");

function createSales($description, $iduser, $idProduct)
{
    openConnection();
    global $connection;

    $query = "INSERT INTO ventas (descripcion_venta, idusuarios, idproductos) VALUES ('$description', $iduser, $idProduct)";

    if ($connection->query($query) === true) {
        closeConnection();
        return true;
    } else {
        closeConnection();
        return "We had a mistake to insert the data: " . $connection->error;
    }
}

function getAllSales()
{
    openConnection();
    global $connection;

    $query = "SELECT * FROM ventas INNER JOIN usuarios ON ventas.idusuarios = usuarios.idusuarios INNER JOIN productos ON ventas.idproductos = productos.idproductos";
    $result = $connection->query($query);

    $sales = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sales[] = $row;
        }
    }
    closeConnection();
    return $sales;
}

function selectUsersToRegisterSales()
{
    openConnection();
    global $connection;

    $query = "SELECT * FROM usuarios";
    $result = $connection->query($query);

    $sales = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sales[] = $row;
        }
    }
    closeConnection();
    return $sales;
}

function selectProductsToRegisterSales()
{
    openConnection();
    global $connection;

    $query = "SELECT * FROM productos";
    $result = $connection->query($query);

    $products = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    closeConnection();
    return $products;
}

function updatSales($id, $description, $idUser, $idProduct)
{
    openConnection();
    global $connection;

    $query = "UPDATE ventas SET descripcion_venta = '$description', idusuarios = $idUser, idproductos = $idProduct WHERE idventas = $id";

    if ($connection->query($query) === true) {
        closeConnection();
        return true;
    } else {
        closeConnection();
        return "We had a mistake to update the sale: " . $connection->error;
    }
}

function deleteSale($id)
{
    openConnection();
    global $connection;

    $query = "DELETE FROM ventas WHERE idventas = $id";

    if ($connection->query($query) === true) {
        closeConnection();
        return true;
    } else {
        closeConnection();
        return "We has an error to delete the sale: " . $connection->error;
    }
}

function getOneSale($id)
{
    openConnection();
    global $connection;

    $query = "SELECT * FROM ventas INNER JOIN usuarios ON ventas.idusuarios = usuarios.idusuarios INNER JOIN productos ON ventas.idproductos = productos.idproductos WHERE idventas = '$id' OR descripcion_venta LIKE '%$id%'";
    $result = $connection->query($query);

    $sales = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sales[] = $row;
        }
    }
    closeConnection();
    return $sales;
}
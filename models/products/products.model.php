<?php
include("./../../connection/connection.php");

function createproduct($name, $price, $description)
{
    openConnection();
    global $connection;

    $query = "INSERT INTO productos (nombre, precio, descripcion) VALUES ('$name', '$price', '$description')";

    if ($connection->query($query) === true) {
        closeConnection();
        return true;
    } else {
        closeConnection();
        return "We had a mistake to insert the data: " . $connection->error;
    }
}

function getAllProducts()
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

function updateProducts($id, $name, $price, $description)
{
    openConnection();
    global $connection;

    $query = "UPDATE productos SET nombre = '$name', precio = '$price', descripcion = '$description' WHERE idproductos = $id";

    if ($connection->query($query) === true) {
        closeConnection();
        return true;
    } else {
        closeConnection();
        return "We had an error to update the product: " . $connection->error;
    }
}

function deleteProducts($id)
{
    openConnection();
    global $connection;

    $query = "DELETE FROM productos WHERE idproductos = $id";

    if ($connection->query($query) === true) {
        closeConnection();
        return true;
    } else {
        echo "<script>alert('The product exists in sales table: ')</script>" . $connection->error;
    }
}

function getOneProduct($id)
{
    openConnection();
    global $connection;

    $query = "SELECT * FROM productos WHERE idproductos = '$id' OR nombre LIKE '%$id%' OR precio LIKE '%$id%' OR descripcion LIKE '%$id%'";

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
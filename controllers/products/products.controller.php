<?php
include("./../../models/products/products.model.php");

session_start();

if (isset($_POST['Registerproduct'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $result = createproduct($name, $price, $description);

    if ($result) {
        $_SESSION['products'] = getAllProducts();
        header("location: ./../../views/products/showAllProducts.view.php");
    } else {
        echo $result;
    }
}

if (isset($_POST['updateProducts'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $result = updateProducts($id, $name, $price, $description);

    if ($result === true) {
        $_SESSION['products'] = getAllProducts();
        header("location: ./../../views/products/showAllProducts.view.php");
    } else {
        echo $result;
    }
}

if (isset($_POST['deleteProduct'])) {
    $id = $_POST['id'];

    $result = deleteProducts($id);

    if ($result === true) {
        $_SESSION['products'] = getAllProducts();
        header("location: ./../../views/products/showAllProducts.view.php");
    } else {
        echo $result;
    }
}

if (isset($_POST['filterProduct'])) {
    $idFiltrado = $_POST['id'];
    $result = getOneProduct($idFiltrado);

    if (!empty($result)) {
        $_SESSION['products'] = $result;
        header("location: ./../../views/products/showAllProducts.view.php");
    } else {
        header("location: ./../../views/products/showAllProducts.view.php");
        $_SESSION["products"] = getAllProducts();
    }
}

if (isset($_POST["filterAllProducts"])) {
    $_SESSION['products'] = getAllProducts();
    header("location: ./../../views/products/showAllProducts.view.php");
}
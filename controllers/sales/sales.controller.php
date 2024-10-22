<?php
include("./../../models/sales/sales.model.php");

session_start();

if (isset($_POST["Registersale"])) {
    $description = $_POST['description'];
    $user = $_POST['user'];
    $product = $_POST['product'];

    $result = createSales($description, $user, $product);

    if ($result) {
        $_SESSION['sales'] = getAllSales();
        header("location: ./../../views/sales/showAllSales.view.php");
    } else {
        echo $result;
    }
}

if (isset($_POST['updateSales'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $iduser = $_POST['user'];
    $idproduct = $_POST['product'];

    $result = updatSales($id, $description, $iduser, $idproduct);

    if ($result === true) {
        $_SESSION['sales'] = getAllSales();
        header("location: ./../../views/sales/showAllSales.view.php");
    } else {
        echo $result;
    }
}

if (isset($_POST["deleteSale"])) {
    $idSale = $_POST['id'];

    $result = deleteSale($idSale);

    if ($result === true) {
        $_SESSION["sales"] = getAllSales();
        header("location: ./../../views/sales/showAllSales.view.php");
    } else {
        echo $result;
    }
}

if (isset($_POST['filterSales'])) {
    $idFiltrado = $_POST['id'];
    $result = getOneSale($idFiltrado);

    if (!empty($result)) {
        $_SESSION['sales'] = $result;
        header("location: ./../../views/sales/showAllSales.view.php");
    } else {
        header("location: ./../../views/sales/showAllSales.view.php");
        $_SESSION['sales'] = getAllSales();
    }
}

if (isset($_POST['showAllSales'])) {
    $_SESSION['sales'] = getAllSales();
    header("location: ./../../views/sales/showAllSales.view.php");
}
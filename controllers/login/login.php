<?php
session_start();
include("./../../connection/connection.php");

openConnection();

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT idusuarios, nombres, password, descripcion FROM usuarios INNER JOIN roles ON usuarios.idroles = roles.idroles WHERE correo = '$email'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row["password"])) {
        $_SESSION['id'] = $row['idusuarios'];
        $_SESSION['name'] = $row['nombres'];
        $_SESSION['role'] = $row["descripcion"];
        if ($_SESSION['role'] === "Administrador") {
            header("location: ./../../views/profiles/adminProfile.php");
        } else if ($_SESSION["role"] === "Vendedor") {
            header("location: ./../../views/profiles/sellerProfile.php");
        }
    } else {
        echo "<script>alert('The password or the email are incorrects');
        window.location.href = './../../views/login/login.php';</script>";
    }
}

closeConnection();
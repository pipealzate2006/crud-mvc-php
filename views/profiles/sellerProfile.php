<?php

session_start();

if (!isset($_SESSION["id"]) || ($_SESSION['role']) !== "Vendedor") {
    header("location: ./../login/login.php");
    exit();
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include("./../navbar/navbar.php");    
    header("location: ./../sales/showAllSales.view.php")
    ?>
</body>

</html>
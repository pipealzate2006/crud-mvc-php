<?php
include("./../../models/sales/sales.model.php");
session_start();

if (!isset($_SESSION['id']) && ($_SESSION['role']) !== "Vendedor") {
    session_destroy();
    session_unset();
    header("location: ./../login/login.php");
    exit();
}

$name = $_SESSION['name'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">
    <?php include("./../navbar/navbar.php") ?>
    <div class="flex justify-center items-center min-h-screen bg-black">
        <form action="./../../controllers/products/products.controller.php" method="post"
            class="flex justify-center items-center flex-col bg-gray-800 text-white p-10 rounded-lg">
            <h1 class="text-center text-3xl font-bold mb-5">Register a product</h1>
            <div class="flex flex-col space-y-1">
                <label for="" class="self-start text-sm font-bold">Enter the name</label>
                <input type="text" name="name" class="bg-gray-600 w-full border-none outline-none p-1 rounded-lg">
                <label for="" class="self-start text-sm font-bold">Enter the price</label>
                <input type="number" name="price" class="bg-gray-600 w-full border-none outline-none p-1 rounded-lg">
                <label for="" class="self-start text-sm font-bold">Description</label>
                <textarea name="description" id=""
                    class="border-none outline-none w-full bg-gray-600 p-1 rounded-lg"></textarea>
            </div>
            <button class="mt-3 font-bold bg-blue-600 text-white p-1 rounded-lg" type="submit"
                name="Registerproduct">Enviar</button>
        </form>
    </div>
</body>

</html>
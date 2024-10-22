<?php
session_start();

include("./../../models/sales/sales.model.php");

if (!isset($_SESSION['id']) || ($_SESSION['role']) !== "Vendedor") {
    header("location: ./../login/login.php");
    exit();
}

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
        <form action="./../../controllers/sales/sales.controller.php" method="post"
            class="flex justify-center items-center flex-col bg-gray-800 text-white p-10 rounded-lg">
            <h1 class="text-center text-3xl font-bold mb-5">Register a sale</h1>
            <div class="flex flex-col space-y-1">
                <label for="" class="self-start text-sm font-bold">Enter the description</label>
                <textarea type="text" name="description"
                    class="bg-gray-600 w-full border-none outline-none p-1 rounded-lg"></textarea>
                <label for="" class="self-start text-sm font-bold">Select the user</label>
                <select name="user" id="" class="bg-gray-600 border-none outline-none w-full border-2 p-1 rounded-lg">
                    <option value=""></option>
                    <?php
                    $users = selectUsersToRegisterSales();

                    if (!empty($users)) {
                        foreach ($users as $user) {
                            ?>
                            <option value="<?= $user['idusuarios'] ?>"><?= $user['nombres'] ?>
                            </option>
                            <?php
                        }
                    } else {
                        echo "<option>No users available</option>";
                    }
                    ?>
                </select>
                <label for="" class="self-start text-sm font-bold">Select the product</label>
                <select name="product" id="" class="border-none outline-none bg-gray-600 w-full p-1 rounded-lg">
                    <option value=""></option>
                    <?php
                    $products = selectProductsToRegisterSales();

                    if (!empty($products)) {
                        foreach ($products as $product) {
                            ?>
                            <option value="<?= $product['idproductos'] ?>"><?= $product['nombre'] ?>
                            </option>
                            <?php
                        }
                    } else {
                        echo "<option>No products available</option>";
                    }
                    ?>
                </select>
            </div>
            <button class="mt-3 font-bold bg-blue-600 text-white p-1 rounded-lg" type="submit"
                name="Registersale">Enviar</button>
        </form>
    </div>
</body>

</html>
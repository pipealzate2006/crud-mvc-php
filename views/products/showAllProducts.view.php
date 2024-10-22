<?php
session_start();
if (!isset($_SESSION["id"]) || ($_SESSION['role']) !== "Vendedor") {
    session_destroy();
    session_unset();
    header("location: ./../login/login.php");
    exit();
}

$name = $_SESSION['name'];
$role = $_SESSION['role'];

include('./../../models/products/products.model.php');
$products = getAllProducts();

if (isset($_SESSION['products']) && !empty($_SESSION['products'])) {
    $products = $_SESSION['products'];
} else {
    $products = getAllProducts();
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

<body class="bg-black">
    <?php include("./../navbar/navbar.php"); ?>
    <h1 class="text-white text-4xl">Hello <span class="font-bold"><?php echo $name ?></span>, your role is <span
            class="font-bold"><?php echo $role ?></span>
    </h1>
    <div class="flex flex-col justify-center items-center min-h-screen space-y-5">
        <div class="flex space-x-2 items-center">
            <form action="./../../controllers/products/products.controller.php" method="post">
                <input type="text" name="id" class="border-2 rounded-lg p-1" placeholder="Filter a product">
                <button name="filterProduct" type="submit" class="bg-blue-500 p-1 text-white rounded-lg">Filter</button>
            </form>
            <form action="./../../controllers/products/products.controller.php" method="post">
                <button name="filterAllProducts" type="submit" class="bg-green-500 p-1 text-white rounded-lg">Show all
                    users</button>
            </form>
        </div>
        <div class="overflow-x-auto w-full px-5">
            <table class="rounded-lg overflow-hidden min-w-full">
                <tr class="bg-gray-700 text-white rounded-lg">
                    <th class="p-2">ID</th>
                    <th class="p-2">Names</th>
                    <th class="p-2">Prices</th>
                    <th class="p-2">Descriptions</th>
                    <th class="p-2">Actions</th>
                </tr>
                <?php

                foreach ($products as $product) {
                    include("./../modals/products.modal.php");
                    ?>
                    <tr
                        class="text-white text-center border-b border-white  <?php echo $product['idproductos'] % 2 === 0 ? 'bg-gray-700' : 'bg-gray-900' ?>">
                        <td class="p-2 font-bold"><?= $product['idproductos'] ?></td>
                        <td class="p-2"><?= $product['nombre'] ?></td>
                        <td class="p-2"><?= $product['precio'] ?></td>
                        <td class="p-2"><?= $product['descripcion'] ?></td>
                        <td class="flex justify-center p-2 space-x-3">
                            <form action="./../../controllers/products/products.controller.php" method="post">
                                <input type="hidden" name="id" class="text-center w-14 rounded-lg mx-3"
                                    value="<?= $product['idproductos'] ?>">
                                <button type="submit" name="deleteProduct"
                                    class="bg-red-500 hover:bg-red-700 text-white p-2 rounded-lg font-bold"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                            <div>
                                <button data-modal-id="products-<?php echo $product['idproductos'] ?>"
                                    class="openModalButton bg-green-500 hover:bg-green-700 text-white p-2 rounded-lg font-bold"><i
                                        class="fa-solid fa-pen-to-square"></i></button>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/73c11b743b.js" crossorigin="anonymous"></script>
    <script>
        const openModalButtons = document.querySelectorAll(".openModalButton");
        const closeModalButtons = document.querySelectorAll("#closeModalButton");
        const font = document.getElementById("font");

        openModalButtons.forEach(button => {
            button.addEventListener("click", (e) => {
                e.preventDefault();
                const modalId = button.getAttribute("data-modal-id");
                const modal = document.getElementById(modalId);
                modal.classList.remove("hidden");
                font.classList.remove("hidden");
            });
        });

        closeModalButtons.forEach(button => {
            button.addEventListener("click", (e) => {
                e.preventDefault();
                const modal = button.closest('.modal');
                modal.classList.add("hidden");
                font.classList.add("hidden");
            });
        });

        font.addEventListener("click", () => {
            document.querySelectorAll('.modal').forEach(modal => modal.classList.add("hidden"));
            font.classList.add("hidden");
        });
    </script>

</body>

</html>
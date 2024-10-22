<?php

session_start();

if (!isset($_SESSION['id']) || ($_SESSION['role']) !== "Administrador") {
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
    <div class="flex flex-col justify-center items-center min-h-screen bg-black">
        <form action="./../../controllers/users/users.controller.php" method="post"
            class="space-y-2 bg-gray-800 p-10 rounded-lg">
            <h1 class="text-center text-3xl font-bold text-white">Register users</h1>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="" class="block text-sm font-bold text-white">Enter your name</label>
                    <input type="text" name="name" class="border-2 p-1 rounded-lg">
                </div>

                <div>
                    <label for="" class="block text-sm font-bold text-white">Enter your last name</label>
                    <input type="text" name="lastName" class="border-2 p-1 rounded-lg">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="" class="block text-sm font-bold text-white">Enter your cellphone</label>
                    <input type="number" name="cellphone" id="" class="border-2 p-1 rounded-lg">
                </div>

                <div>
                    <label for="" class="block text-sm font-bold text-white">Enter your email</label>
                    <input type="email" name="email" id="" class="border-2 p-1 rounded-lg">
                </div>
            </div>

            <div class="grid grid-cols-2">
                <div>
                    <label for="" class="block text-sm font-bold text-white">Enter your password</label>
                    <input type="password" name="password" id="" class="border-2 p-1 rounded-lg">
                </div>
                <div>
                    <label for="" class="block text-sm font-bold text-white">Select your role</label>
                    <select name="role" id="" class="border-2 p-1 rounded-lg w-full">
                        <option value="1">Administrador</option>
                        <option value="2">Vendedor</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-center">
                <button class="bg-blue-600 text-white p-1 rounded-lg" type="submit" name="RegisterUser">Enviar</button>
            </div>
        </form>
    </div>
</body>

</html>
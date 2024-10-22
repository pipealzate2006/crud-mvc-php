<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex justify-center items-center min-h-screen bg-black">
    <form method="post" action="./../../controllers/login/login.php" class="flex flex-col bg-gray-800 text-white p-10 rounded-lg">
        <h1 class="font-bold text-xl text-center mb-2">Sign In</h1>
        <div class="flex flex-col space-y-2">
            <label for="" class="font-bold text-sm">Enter your email</label>
            <input type="email" name="email"
                class="border-2 outline-none rounded-lg p-2 bg-gray-600 focus:ring-gray-600 text-sm border-none"
                placeholder="Enter your email">
            <label for="" class="font-bold text-sm">Enter your password</label>
            <div class="flex items-center space-x-2 rounded-lg p-2 text-sm bg-gray-600 border-none">
                <input type="password" name="password" placeholder="Enter your password"
                    class="outline-none bg-gray-600" id="input">
                <i class="fa-solid fa-eye cursor-pointer w-4" id="view"></i>
            </div>
        </div>
        <button name="signIn" type="submit" class="mt-4 bg-blue-600 text-white p-1 rounded-lg font-bold">Sign
            in</button>
    </form>

    <script src="https://kit.fontawesome.com/73c11b743b.js" crossorigin="anonymous"></script>
    <script>
        const input = document.querySelector("#input");
        const view = document.querySelector("#view");

        view.addEventListener("click", () => {
            if (input.type === "password") {
                input.type = "text";
                view.classList.remove("fa-eye");
                view.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                view.classList.remove("fa-eye-slash");
                view.classList.add("fa-eye");
            }
        });
    </script>
</body>

</html>
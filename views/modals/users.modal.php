<div id="modal-<?php echo $user['idusuarios'] ?>"
    class="modal absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col justify-center items-center text-white bg-gray-800 p-5 rounded-lg w-2/5 z-50 hidden">
    <h1 class="self-start text-2xl font-bold">Update Users</h1>
    <hr class="w-full border-1">
    <form action="./../../controllers/users/users.controller.php" method="post" class="m-5">
        <input type="hidden" name="id" value="<?php echo $user['idusuarios'] ?>">
        <div class="grid grid-cols-2 gap-5">
            <div>
                <label for="" class="block font-bold self-center">Update your name</label>
                <input type="text" id="" name="name" value="<?php echo $user['nombres'] ?>"
                    class="p-2 border-none rounded bg-gray-700 text-white">
            </div>

            <div>
                <label for="" class="block font-bold self-center">Update your last names</label>
                <input type="text" id="" name="lastName" value="<?php echo $user['apellidos'] ?>"
                    class="p-2 border-none rounded bg-gray-700 text-white">
            </div>

            <div>
                <label for="" class="block font-bold self-center">Update your cellphone</label>
                <input type="number" id="" name="cellphone" value="<?php echo $user['celular'] ?>"
                    class="p-2 border-none rounded bg-gray-700 text-white">
            </div>

            <div>
                <label for="" class="block font-bold self-center">Update your email</label>
                <input type="email" id="" name="email" value="<?php echo $user['correo'] ?>"
                    class="p-2 border-none rounded bg-gray-700 text-white">
            </div>
        </div>

        <div class="mt-3">
            <label for="" class="block font-bold self-center">Update your role</label>
            <select name="role" id="" value="<?php echo $user['idroles'] ?>"
                class="w-full p-2 border-none rounded bg-gray-700 text-white">
                <option value="<?php echo $user['idroles'] ?>"><?php echo $user['descripcion'] ?></option>
                <option value="1">Administrador</option>
                <option value="2">Vendedor</option>
            </select>
        </div>
        <div class="space-x-5">
            <button id="closeModalButton" class="bg-red-500 text-white rounded mt-4 p-2">Close</button>
            <button type="submit" name="updateUser" class="bg-blue-500 text-white rounded mt-4 p-2">Update</button>
        </div>
    </form>
</div>
<div class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="font"></div>
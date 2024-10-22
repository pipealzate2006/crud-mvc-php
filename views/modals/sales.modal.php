<div id="sales-<?php echo $sale['idventas'] ?>"
    class="modal absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col justify-center items-center text-white bg-gray-800 p-5 rounded-lg w-2/5 z-50 hidden">
    <h1 class="self-start text-2xl font-bold">Update Sales</h1>
    <hr class="w-full border-1">
    <form action="./../../controllers/sales/sales.controller.php" method="post" class="m-5">
        <input type="hidden" name="id" value="<?php echo $sale['idventas'] ?>">
        <div class="grid grid-cols-2 gap-5">
            <div>
                <label for="" class="block font-bold self-center">Update description</label>
                <input type="text" id="" name="description" value="<?php echo $sale['descripcion_venta'] ?>"
                    class="p-2 border-none rounded bg-gray-700 text-white outline-none">
            </div>

            <div>
                <label for="" class="block font-bold self-center">Update users</label>
                <select name="user" id="" value="<?php echo $sale['idusuarios'] ?>"
                    class="w-full p-2 border-none rounded bg-gray-700 text-white outline-none">
                    <option value="<?php echo $sale['idusuarios'] ?>"><?php echo $sale['nombres'] ?> <- current user</option>
                    <?php $users = selectUsersToRegisterSales();
                    if (!empty($users)) {
                        foreach ($users as $user) {
                            ?>
                            <option value="<?php echo $user['idusuarios'] ?>"><?php echo $user['nombres'] ?></option>
                            <?php
                        }
                    } else { ?>
                        <option value="">No users avaliable</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div>
            <label for="" class="block font-bold self-center">Update product</label>
            <select name="product" id="" value="<?php echo $sale['idproductos'] ?>"
                class="w-full p-2 border-none rounded bg-gray-700 text-white outline-none">
                <option value="<?php echo $sale['idproductos'] ?>"><?php echo $sale['nombre'] ?> <- current product</option>
                <?php $products = selectProductsToRegisterSales();
                if (!empty($products)) {
                    foreach ($products as $product) {
                        ?>
                        <option value="<?php echo $product['idproductos'] ?>"><?php echo $product['nombre'] ?></option>
                        <?php
                    }
                } else { ?>
                    <option value="">No products avaliable</option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="space-x-5">
            <button id="closeModalButton" class="bg-red-500 text-white rounded mt-4 p-2">Close</button>
            <button type="submit" name="updateSales" class="bg-blue-500 text-white rounded mt-4 p-2">Update</button>
        </div>
    </form>
</div>
<div class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="font"></div>
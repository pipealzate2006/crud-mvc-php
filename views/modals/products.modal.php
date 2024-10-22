<div id="products-<?php echo $product['idproductos'] ?>"
    class="modal absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col justify-center items-center text-white bg-gray-800 p-5 rounded-lg w-2/5 z-50 hidden">
    <h1 class="self-start text-2xl font-bold">Update Products</h1>
    <hr class="w-full border-1">
    <form action="./../../controllers/products/products.controller.php" method="post" class="m-5">
        <input type="hidden" name="id" value="<?php echo $product['idproductos'] ?>">
        <div class="grid grid-cols-2 gap-5">
            <div>
                <label for="" class="block font-bold self-center">Update name</label>
                <input type="text" id="" name="name" value="<?php echo $product['nombre'] ?>"
                    class="p-2 border-none rounded bg-gray-700 text-white outline-none">
            </div>

            <div>
                <label for="" class="block font-bold self-center">Update price</label>
                <input type="text" id="" name="price" value="<?php echo $product['precio'] ?>"
                    class="p-2 border-none rounded bg-gray-700 text-white outline-none">
            </div>
        </div>
        <div>
            <div>
                <label for="" class="block font-bold self-center">Update description</label>
                <input type="text" id="" name="description" value="<?php echo $product['descripcion'] ?>"
                    class="p-2 border-none rounded bg-gray-700 text-white outline-none w-full">
            </div>
        </div>
        <div class="space-x-5">
            <button id="closeModalButton" class="bg-red-500 text-white rounded mt-4 p-2">Close</button>
            <button type="submit" name="updateProducts" class="bg-blue-500 text-white rounded mt-4 p-2">Update</button>
        </div>
    </form>
</div>
<div class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="font"></div>
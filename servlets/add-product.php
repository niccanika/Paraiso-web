<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/controllers/ProductController.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Product.php";

if (isset($_REQUEST["add-product"])) {
    $fileName = $_FILES["product_image"]["name"];
    $tmpPath = $_FILES["product_image"]["tmp_name"];
    $fileSize = $_FILES["product_image"]["size"];

    $uploadDir = "/views/photos/";
    $uploadPath = $_SERVER["DOCUMENT_ROOT"];


    $randomFileName = uniqid();
    $extension = explode(".", $fileName)[1];

    $fullPath = $uploadPath . $uploadDir . $randomFileName . "." . $extension;

    move_uploaded_file($tmpPath, $fullPath);

    $imagePathToDB = substr($uploadDir, 1) . $randomFileName . "." . $extension;

    $product = new Product(0, $_REQUEST["product_name"], $imagePathToDB, $_REQUEST["product_category"], $_REQUEST["product_price"]);
    $productController = new ProductController();
    try {
        $success = $productController->addProduct($product);;
        if ($success) {
            header("Location: /views/product-management.php");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

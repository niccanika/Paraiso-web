<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Product.php";

class ProductController
{

    public function addProduct(Product $product): bool
    {
        try {
            $pdo = Settings::getPDO();
            $sql = "INSERT INTO product (product_name, product_image, product_price, product_category) VALUES (:product_name, :product_image, :product_price, :product_category)";
            $stmnt = $pdo->prepare($sql);

            $stmnt->bindValue(':product_name', $product->getProductName());
            $stmnt->bindValue(':product_image', $product->getProductImage());
            $stmnt->bindValue(':product_price', $product->getProductPrice());
            $stmnt->bindValue(":product_category", $product->getProductCategory());

            $stmnt->execute();
            return true;
        } catch (Exception $e) {
            throw new Exception("Error");
        }
    }
}
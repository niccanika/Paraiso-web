<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";

session_start();

if (isset($_SESSION["user_login"])) {
    if (isset($_REQUEST["edit"])) {
        try {
            $id = intval($_GET['product']);

            $pdo = Settings::getPDO();


            $sql = "UPDATE product SET product_name=:product_name, product_price=:product_price, product_category=:product_category WHERE id = :id";
            $stmnt = $pdo->prepare($sql);
            $stmnt->execute(
                array(
                    ':product_name' => $_REQUEST["product_name"],
                    ':product_price' => $_REQUEST["product_price"],
                    ':product_category' => $_REQUEST["product_category"],
                    ':id' => $id
                )
            );

            if (isset($_FILES["product_image"])){
                if ($_FILES["product_image"]["size"] > 0) {
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

                    $sql = "UPDATE product SET product_image=:product_image WHERE id=:id";

                    $stmnt = $pdo->prepare($sql);
                    $stmnt->execute(
                        array(
                            ':product_image' => $imagePathToDB,
                            ':id' => $id
                        )
                    );
                }
            }

            header("location:/views/product-management.php?msg=updated");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    } elseif (isset($_REQUEST["delete"])) {
        try {
            $id = intval($_GET['product']);

            $pdo = Settings::getPDO();


            $sql = "DELETE FROM product WHERE id=:id";
            $stmnt = $pdo->prepare($sql);
            $stmnt->execute(
                array(
                    ':id' => $id
                )
            );

            header("location:/views/product-management.php?msg=deleted");

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";

$pdo = Settings::getPDO();

if (isset($_SESSION["user_login"]) && isset($_GET["id"])){
    $productID = $_GET["id"];
    $userID = $_SESSION["user_login"];

    $check = $pdo->prepare("SELECT * FROM favorites WHERE user_id=$userID");
    $check->execute();
    $checkResult = $check->fetch();

    if (!$checkResult) {
        $sql1 = "INSERT INTO favorites (user_id) VALUES (:user_id)";
        $stmnt = $pdo->prepare($sql1);
        $stmnt->execute(
            array(
                ':user_id' => $userID
            )
        );
    }

    $loc = "location:/servlets/add-favourite-entry.php?id=" . $productID;

    header($loc);
//    $sql = "INSERT INTO favorites_entry (wishlist_id, product_id) VALUES (:wishlist_id, :product_id)";
//    $stmnt1 = $pdo->prepare($sql);
//    if ($checkResult) {
//        $stmnt1->execute(
//            array(
//                ':wishlist_id' => $checkResult["wishlist_id"],
//                ':product_id' => $productID
//            )
//        );
//    } else {
//        $query = $pdo->prepare("SELECT * FROM favorites WHERE user_id=$userID");
//        $query->execute();
//        $checkResult1 = $check->fetch();
//
//        $stmnt1->execute(
//            array(
//                ':wishlist_id' => $checkResult1["wishlist_id"],
//                ':product_id' => $productID
//            )
//        );
//
//    }
}

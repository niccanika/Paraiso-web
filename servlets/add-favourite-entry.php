<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";

$pdo = Settings::getPDO();

if (isset($_SESSION["user_login"]) && isset($_GET["id"])) {
    $productID = $_GET["id"];
    $userID = $_SESSION["user_login"];

    $query = $pdo->prepare("SELECT * FROM favorites WHERE user_id=$userID");
    $query->execute();
    $res = $query->fetch();


    $sql = "INSERT INTO favorites_entry (wishlist_id, product_id) VALUES (:wishlist_id, :product_id)";
    $stmnt1 = $pdo->prepare($sql);
    $stmnt1->execute(
        array(
            ':wishlist_id' => $res["wishlist_id"],
            ':product_id' => $productID
        )
    );

    $loc = "location:/views/favourites.php?wishlist-id=" . $res["wishlist_id"];

    header($loc);
}
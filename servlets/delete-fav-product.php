<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";
session_start();

$pdo = Settings::getPDO();

$product_id = $_GET["id"];
$wishlist_id = $_GET["wishlist"];

$query = $pdo->prepare("DELETE FROM favorites_entry WHERE product_id=:product_id AND wishlist_id=:wishlist_id");
$query->execute(
    array(
        ':product_id' => $product_id,
        ':wishlist_id' => $wishlist_id
    )
);

header("location:/views/favourites.php");


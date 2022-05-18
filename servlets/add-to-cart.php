<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";
session_start();

if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {

    $pdo = Settings::getPDO();

    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    $stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
    $stmt->execute(array(':id' => $product_id));
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product && $quantity > 0) {

        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {

                $_SESSION['cart'][$product_id] += $quantity;
            } else {

                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    header('location: /views/shopping-cart.php');
    exit;
}

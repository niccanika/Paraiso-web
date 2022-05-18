<?php
session_start();
if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['id']])) {
    unset($_SESSION['cart'][$_GET['id']]);
}
header('location: /views/shopping-cart.php');
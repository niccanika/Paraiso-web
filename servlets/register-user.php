<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/controllers/UserController.php";

if (isset($_REQUEST["name"]) && isset($_REQUEST["password"]) && isset($_REQUEST["email"])
    && isset($_REQUEST["age"])){
    $user = new User(
        0,
        $_REQUEST["age"],
        0,
        $_REQUEST["password"],
        $_REQUEST["name"],
        $_REQUEST["email"]
    );

    $userController = new UserController();

    try {
        $success = $userController->register($user);
        if ($success){
            header("Location: /views/login-form.php");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

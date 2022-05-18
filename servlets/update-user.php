<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controllers/UserController.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";

session_start();

if (isset($_SESSION["user_login"])) {
    if (isset($_REQUEST["edit"])) {
        try {
            $id = $_SESSION['user_login'];

            $pdo = Settings::getPDO();
            $sql = "UPDATE users SET name=:name, email=:email, age=:age WHERE id = :id";
            $stmnt = $pdo->prepare($sql);
            $stmnt->execute(
                array(
                    ':name' => $_REQUEST["name"],
                    ':email' => $_REQUEST["email"],
                    ':age' => $_REQUEST["age"],
                    ':id' => $id
                )
            );
            header("location:/views/edit-profile-form.php?msg=updated");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}
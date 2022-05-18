<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controllers/UserController.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";

session_start();

if (isset($_SESSION["user_login"])) {
    if (isset($_REQUEST["change-password"])) {
        try {
            $id = $_SESSION['user_login'];

            $pdo = Settings::getPDO();
            $sql = "UPDATE users SET password=:password WHERE id = :id";
            $newPasswordHash = password_hash($_REQUEST["password"], PASSWORD_ARGON2ID);
            $stmnt = $pdo->prepare($sql);
            $stmnt->execute(
                array(
                    ':password' => $newPasswordHash,
                    ':id' => $id
                )
            );
            header("location:/views/change-password-form.php?msg=updated");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}
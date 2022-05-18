<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controllers/UserController.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/database/Settings.php";

session_start();

if (isset($_SESSION["user_login"])){
    header("location:/views/user_profile.php");
}

if (isset($_REQUEST["login"])) {
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];

    try {
        $pdo = Settings::getPDO();
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmnt = $pdo->prepare($sql);
        $stmnt->execute(
            array(
                ':email' => $email
            )
        );
        $result = $stmnt->fetch(PDO::FETCH_ASSOC);
        if ($stmnt->rowCount() > 0) {
            if($email==$result["email"]){
                if(password_verify($password, $result["password"])){
                    $_SESSION["user_login"] = $result["id"];
                    header("location:/views/user_profile.php");
                } else {
                    echo '<h1>Wrong Data</h1>';
                    header("location:/views/login-form.php?msg=failed");
                }
            }
        } else {
            echo '<h1>Wrong Data</h1>';
            header("location:/views/login-form.php");
        }
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}


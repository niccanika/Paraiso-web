<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";

if (isset($_REQUEST["edit"])) {
    try {
        $id = intval($_GET['id']);;

        $pdo = Settings::getPDO();
        $sql = "UPDATE users SET name=:name, email=:email, age=:age, role=:role WHERE id = :id";
        $stmnt = $pdo->prepare($sql);
        $stmnt->execute(
            array(
                ':name' => $_REQUEST["name"],
                ':email' => $_REQUEST["email"],
                ':age' => $_REQUEST["age"],
                ':role' => $_REQUEST["role"],
                ':id' => $id
            )
        );

        var_dump($_REQUEST["role"]);
        header("location:/views/user-management.php?msg=updated");
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}
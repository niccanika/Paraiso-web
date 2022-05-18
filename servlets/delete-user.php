<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";

session_start();

try {
    $id = intval($_GET['id']);

    $pdo = Settings::getPDO();

    $sql = "DELETE FROM users WHERE id=:id";
    $stmnt = $pdo->prepare($sql);
    $stmnt->execute(
        array(
            ':id' => $id
        )
    );

    header("location:/views/user-management.php?msg=deleted");

} catch (Exception $e) {
    echo $e->getMessage();
}
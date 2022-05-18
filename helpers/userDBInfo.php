<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";

session_start();
if (!isset($_SESSION['user_login'])) {
    header("location: /index.php");
}

$id = $_SESSION['user_login'];

$pdo = Settings::getPDO();
$sql = "SELECT * FROM users WHERE id = :id";
$stmnt = $pdo->prepare($sql);
$stmnt->execute(
    array(
        ':id' => $id
    ));

$result = $stmnt->fetch(PDO::FETCH_ASSOC);

include_once "../views/navigation.php";
?>


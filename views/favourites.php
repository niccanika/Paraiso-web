<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Favourites | Paraíso</title>
    <link rel="stylesheet"
          href="../css/shop_style.css">

    <style>
        h1 {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .table-wrapper{
            margin: 10px 70px 70px;
            box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.1 );
        }

        table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        td, th {
            text-align: center;
            padding: 8px;
        }

        td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }
    </style>
</head>
<body>
<div class="container">
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";
session_start();
include_once "navigation.php";

$userID = $_SESSION["user_login"];


$pdo = Settings::getPDO();

$query = $pdo->prepare("SELECT wishlist_id FROM favorites WHERE user_id=$userID");
$query->execute();
$wishlist_id = $query->fetch();

$stmnt = $pdo->prepare("SELECT * FROM favorites_entry WHERE wishlist_id = :wishlist_id");
$stmnt->execute(
        array(
                ':wishlist_id' => $wishlist_id['wishlist_id']
        )
);
$result = $stmnt->fetchAll(PDO::FETCH_ASSOC);

?>
    <article style="padding-top: 5rem; padding-left: 2rem">
        <a href="javascript:history.go(-1)"
           class="go-back" style="display: flex; gap: .5rem; font-size: 1.25rem; font-weight: lighter; width: 5rem;"><img src="icons/arrow.svg"
                                                                                                                          alt="back">
            <p>back</p></a>
        <h1 style="margin-top: 3rem">Cart</h1>
    </article>
    <article class="table-wrapper">
        <table class="table has-background-white">
            <th class="is-size-5"></th>
            <th class="is-size-5">Name</th>
            <th class="is-size-5">Price</th>
            <th class="is-size-5"></th>
            <?php if (empty($result)){ ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your wishlist</td>
                </tr>
            <?php } else { ?>
                <?php foreach ($result as $res){
                    $stmnt1 = $pdo->prepare("SELECT * FROM product WHERE id = :id");
                    $stmnt1->execute(
                        array(
                            ':id' => $res["product_id"]
                        )
                    );
                    $product = $stmnt1->fetch();
                    ?>
                    <tr>
                        <td class="is-size-5"><img style="width: 4rem" src="<?=substr($product["product_image"],6)?>" alt="<?=$product["product_name"]?>"></td>
                        <td class="is-size-5"><?=$product["product_name"]?></td>
                        <td class="is-size-5"><?=$product["product_price"]?></td>
                        <td class="is-size-5"><a href="product.php?product=<?=$product["id"]?>"><i class="fa-solid fa-cart-plus"></i></a></td>
                        <td class="is-size-5"><a href="/servlets/delete-fav-product.php?id=<?=$product["id"]?>&wishlist=<?=$wishlist_id["wishlist_id"]?>"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <?php
                }
            }
            ?>

        </table>
    </article>
</div>
<script src="https://kit.fontawesome.com/7c26fe3118.js" crossorigin="anonymous"></script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping cart | Paraíso</title>
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
session_start();
include_once "navigation.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";
$pdo = Settings::getPDO();

$products_in_cart = $_SESSION['cart'] ?? array();
$products = [];
$total_total = 0.00;

if ($products_in_cart) {
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM product WHERE id IN (' . $array_to_question_marks . ')');

    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $total_total += (float)$product['product_price'] * (int)$products_in_cart[$product['id']];
    }
}
?>

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
            <th class="is-size-5">Quantity</th>
            <th class="is-size-5">Total</th>
            <th></th>
            <?php if (empty($products)){ ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
            <?php } else { ?>
            <?php foreach ($products as $product){ ?>
                <tr>
                    <td class="is-size-5"><img style="width: 4rem" src="<?=substr($product["product_image"],6)?>" alt="<?=$product["product_name"]?>"></td>
                    <td class="is-size-5"><?=$product["product_name"]?></td>
                    <td class="is-size-5"><?=$product["product_price"]?></td>
                    <td class="is-size-5"><?=$_SESSION['cart'][$product["id"]]?></td>
                    <td class="is-size-5"><?=(float)$product['product_price'] * (int)$_SESSION['cart'][$product["id"]]?> €</td>
                    <td class="is-size-5"><a href="/servlets/delete-cart-product.php?id=<?=$product["id"]?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            <?php
                }
                }
            ?>

        </table>
    </article>
    <h3 style="float: right; margin-right: 5vw">Total: <?php echo $total_total?> €</h3>
    <a href="shop.php?species=All" style="margin-left: 5vw; font-weight: bold">Back to shop</a>
</div>
<script src="https://kit.fontawesome.com/7c26fe3118.js" crossorigin="anonymous"></script>
</body>
</html>
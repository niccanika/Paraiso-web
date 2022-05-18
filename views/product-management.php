<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product management | Paraíso</title>
    <link rel="stylesheet"
          href="../css/shop_style.css">
</head>
<body>

<div class="container">
    <?php
    session_start();
    include_once "navigation.php";
    ?>
<!--    <article style="position: relative; top: 5rem; padding-left: 2rem">-->
    <article style="padding-top: 5rem; padding-left: 2rem">
        <a href="user_profile.php"
           class="go-back" style="display: flex; gap: .5rem; font-size: 1.25rem; font-weight: lighter; width: 5rem;"><img src="icons/arrow.svg"
                     alt="back">
            <p>back</p></a>
        <h1 style="margin-top: 3rem">Product management</h1>

        <a href="add-product-form.php">Add a new product</a>
    </article>
    <article class="products" style="margin-top: 10rem">

        <?php
        require_once('../database/Settings.php');

        $pdo = Settings::getPDO();

        $sql = "SELECT * FROM product ORDER BY id DESC";

        $ps = $pdo->prepare($sql);

        $ps->execute();

        $getAllProducts = $ps->fetchAll(PDO::FETCH_ASSOC);

        if (isset($_GET["msg"]) && $_GET["msg"] == 'updated') {
            echo "<p style='position: relative; top: -2rem; width: 100%; text-align: center; color: green'>Info updated</p>";
        }

        if (isset($_GET["msg"]) && $_GET["msg"] == 'deleted') {
            echo "<p style='position: relative; top: -2rem; width: 100%; text-align: center; color: darkred'>Product deleted</p>";
        }

        foreach ($getAllProducts as $product) {
//            if ($product["product_category"] == $_GET['species'] or $_GET['species'] == "All"){

                ?>

                <div class="product">
                    <a href="edit-product-form.php?product=<?php echo $product["id"]?>">
                        <div class="image">
                            <img src="<?php echo substr($product["product_image"], 6)?>"
                                 alt="<?php echo $product["product_name"]?>">
                        </div>
                        <p><?php echo $product["product_name"]?></p>
                        <p class="price"><?php echo $product["product_price"]?>€</p>
                    </a>
                </div>

                <?php
//            }
        }
        ?>


    </article>
</div>

</body>
</html>

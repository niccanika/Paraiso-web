<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Product | Paraíso</title>
    <link rel="stylesheet"
          href="../css/product_style.css">
  </head>
  <body>
  <?php
  session_start()
  ?>
    <div class="container">
      <?php
      include_once "navigation.php"
      ?>

      <a href="javascript:history.go(-1)"
         class="go-back"><img src="icons/arrow.svg"
                              alt="back">
        <p>back</p></a>

      <article>

        <div class="product">

            <?php
            require_once('../database/Settings.php');

            if (isset($_SESSION['user_login'])) {

                $user_id = $_SESSION['user_login'];

                $pdo = Settings::getPDO();

//            $product = "SELECT * FROM product WHERE id = .$_GET['product'].";
//            $sql = "SELECT * FROM product WHERE id = $_GET['product']";
                $sql = 'SELECT * FROM product WHERE id = ' . $_GET['product'] . '';
                $ps = $pdo->prepare($sql);
                $ps->execute();

                $product = $ps->fetch(PDO::FETCH_ASSOC);

                $stmnt = $pdo->prepare('SELECT * FROM favorites_entry WHERE product_id =' . $_GET['product'] . '');
                $stmnt2 = $pdo->prepare('SELECT * FROM favorites WHERE user_id =' . $_SESSION['user_login'] . '');
                $stmnt->execute();
                $p = $stmnt->fetchAll(PDO::FETCH_ASSOC);
                $stmnt2->execute();
                $w = $stmnt2->fetch();

                $heart = "icons/heart.svg";

                if ($w) {

                    foreach ($p as $i) {
                        if ($i["wishlist_id"] == $w["wishlist_id"]) {
                            $heart = "icons/heart_selected.svg";
                            break;
                        }
                    }
                }
            }
            ?>

            <div class="product-text">
                <h2><?php echo $product["product_name"] ?></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                    adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam
                    quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
                    laboriosam, nisi ut aliquid ex ea commodi consequatur </p>
                <p class="price"><?php echo $product["product_price"] ?>€</p>
                <form action="../servlets/add-to-cart.php" method="post">
                    <div class="buttons">

                        <input type="number" name="quantity" step="1" id="quantity" value="1" class="numberstyle"
                               max="10" min="1">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="submit" value="add to cart" name="add" class="button" id="add">
                        <a href="../servlets/add-favourite.php?id=<?= $product['id'] ?>"><img src="<?= $heart ?>"
                                         alt="favourite"></a>

                    </div>
                </form>
            </div>

          <div class="product-img">
            <img src="<?php echo substr($product["product_image"], 6)?>"
                 alt="<?php echo $product["product_name"]?>">
          </div>

        </div>

        <div class="product-info">

          <div class="item">
            <div class="name">
              <img src="icons/origin.svg"
                   alt="Origin">
              <p class="name-text">origin</p>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
               dolore magna aliqua. </p>
          </div>

          <div class="item">
            <div class="name">
              <img src="icons/care.svg"
                   alt="Care">
              <p class="name-text">care</p>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
               dolore magna aliqua. </p>
          </div>

          <div class="item">
            <div class="name">
              <img src="icons/smile.svg"
                   alt="Benefits">
              <p class="name-text">Benefits</p>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
               dolore magna aliqua. </p>
          </div>

          <div class="item">
            <div class="name">
              <img src="icons/pet.svg"
                   alt="Pet friendliness">
              <p class="name-text">pet friendliness</p>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
               dolore magna aliqua. </p>
          </div>

        </div>

        <div class="video">
          <iframe
            src="https://www.youtube.com/embed/WlMKdq_0URM"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        </div>
      </article>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>
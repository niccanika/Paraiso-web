<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Shop | Paraíso</title>
    <link rel="stylesheet"
          href="../css/shop_style.css">
  </head>
  <body>
    <?php
    session_start();
    include_once "navigation.php";

    $chosen = $_GET['species'];
    ?>

    <div class="header-img"></div>
    <div class="categories">
      <ul class="plants-category">
        <li id="<?php if ($chosen == "All" or !isset($_GET['species'])){echo "chosen";} ?>"><a href="shop.php?species=All">All</a></li>
        <li id="species"><a href="#"><img src="icons/dropdown.svg"
                                          alt="dropdown"
                                          id="dropdown-species">Species</a></li>
        <li id="type"><a href="#"><img src="icons/dropdown.svg"
                                       alt="dropdown"
                                       id="dropdown-type">Type</a></li>
        <li id="<?php if ($chosen == "Alocasia"){echo "chosen";} ?>" class="plants"><a href="shop.php?species=Alocasia">Alocasia</a></li>
        <li id="<?php if ($chosen == "Palm tree"){echo "chosen";} ?>" class="plants"><a href="shop.php?species=Palm tree">Palm tree</a></li>
        <li id="<?php if ($chosen == "Pothos"){echo "chosen";} ?>" class="plants"><a href="shop.php?species=Pothos">Pothos</a></li>
        <li id="<?php if ($chosen == "Monstera"){echo "chosen";} ?>" class="plants"><a href="shop.php?species=Monstera">Monstera</a></li>
        <li id="<?php if ($chosen == "Succulent"){echo "chosen";} ?>" class="plants"><a href="shop.php?species=Succulent">Succulent</a></li>
      </ul>
      <ul class="type-category">
        <li class="type-cat"><a href="#">Pet safe</a></li>
        <li class="type-cat"><a href="#">Low maintenance</a></li>
        <li class="type-cat"><a href="#">Low light</a></li>
      </ul>
    </div>

    <article class="products">

        <?php
        require_once('../database/Settings.php');

        $pdo = Settings::getPDO();

        $sql = "SELECT * FROM product ORDER BY id DESC";

        $ps = $pdo->prepare($sql);

        $ps->execute();

        $getAllProducts = $ps->fetchAll(PDO::FETCH_ASSOC);

        foreach ($getAllProducts as $product) {
            if ($product["product_category"] == $_GET['species'] or $_GET['species'] == "All"){

        ?>

      <div class="product">
        <a href="product.php?product=<?php echo $product["id"]?>">
          <div class="image">
            <img src="<?php echo substr($product["product_image"], 6)?>"
                 alt="<?php echo $product["product_name"]?>">
          </div>
          <p><?php echo $product["product_name"]?></p>
          <p class="price"><?php echo $product["product_price"]?>€</p>
        </a>
      </div>

        <?php
            }
        }
        ?>


    </article>

    <hr>

    <article class="newsletter">
      <h2>subscribe to our newsletter</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <form action="#">
        <label for="name">Your name</label>
        <input type="text"
               id="name"
               name="name"
               placeholder="Your name">
        <label for="email">Your email address</label>
        <input type="email"
               id="email"
               name="email"
               placeholder="Your email address">
        <button>Subscribe</button>
      </form>
    </article>

    <footer>
      <div class="sitemap">
        <p>site map</p>
        <div class="sitemap-flex">
          <a href="shop.php?species=All">shop</a>
          <a href="shop.php?species=Alocasia">alocasia</a>
          <a href="shop.php?species=Succulent">succulent</a>
          <a href="about.php">about</a>
          <a href="shop.php?species=Palm tree">palm tree</a>
          <a href="#">FAQ</a>
          <a href="login-form.php">log in</a>
          <a href="shop.php?species=Pothos">pothos</a>
          <a href="#">terms & conditions</a>
          <a href="contact.php">contact</a>
          <a href="shop.php?species=Monstera">monstera</a>
          <a href="#">privacy policy</a>
        </div>
      </div>
      <div class="social">
        <p>social</p>
        <div class="social-flex">
          <a href="#"><img src="icons/Instagram.svg"
                           alt="instagram"><span class="social-link">@paraiso_plants</span></a>
          <a href="#"><img src="icons/facebook.svg"
                           alt="facebook"><span class="social-link">Paraíso plants</span></a>
          <a href="#"><img src="icons/Pinterest.svg"
                           alt="pinterest"><span class="social-link">@paraiso_plants</span></a>
          <a href="#"><img src="icons/Youtube.svg"
                           alt="youtube"><span class="social-link">Paraíso plants</span></a>
        </div>
      </div>
    </footer>

    <script src="js/script.js"></script>
  </body>
</html>
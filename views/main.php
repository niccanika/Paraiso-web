<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Paraíso</title>
    <link rel="shortcut icon"
          href="#">
      <?php include_once "header_main.php"?>
<!--    <link rel="stylesheet"-->
<!--          href="C:\Users\User\Documents\tmws semestralka\views\css\main.css">-->
<!--      --><?php //$dir = realpath($_SERVER["DOCUMENT_ROOT"]); ?>
<!--      <link rel="stylesheet"-->
<!--          href="--><?php //echo $dir.'/views/css/main.css'; ?><!--">-->
  </head>
  <body>
  <?php
  session_start()
  ?>
    <nav>
      <div class="burger">
        <a href="#"
           class="toggle-nav">
          <img src="views/icons/menu_phone.svg"
               alt="burger menu"
               id="toggle-img">
        </a>
      </div>

      <form action="#"
            class="search-mobile">
        <label for="nav-search">Search</label>
        <input type="text"
               class="input-search"
               id="nav-search"
               placeholder="search">
        <button class="btn-search"><img src="views/icons/search.svg"
                                        alt="Search"></button>
      </form>

      <div class="left">
        <ul>
          <li><a href="views/shop.php?species=All">shop</a></li>
          <li><a href="views/about.php">about us</a></li>
          <li><a href="views/contact.php">contact</a></li>
        </ul>
      </div>

      <a href="#"
         id="logo">Paraíso</a>

      <div class="right">
        <ul>
            <?php
            if(isset($_SESSION['user_login'])){
                ?>
                <li><a href="views/user_profile.php"
                       id="profile">My profile</a></li>
                <?php
            }else{
                ?>
                <li><a href="views/login-form.php"
                       id="login">LOG IN</a></li>
                <?php
            }
            ?>
          <li><a href="#"><img src="views/icons/search.svg"
                               alt="Search"
                               id="search"></a></li>
          <li><a href="views/favourites.php"><img src="views/icons/heart.svg"
                               alt="Favourites"></a></li>
          <li><a href="views/shopping-cart.php"><img src="views/icons/shopping_cart.svg"
                               alt="Shopping cart"></a></li>
        </ul>
      </div>
      <div class="social-nav">
        <a href="#"><img src="views/icons/Instagram.svg"
                         alt="instagram"></a>
        <a href="#"><img src="views/icons/facebook.svg"
                         alt="facebook"></a>
        <a href="#"><img src="views/icons/Pinterest.svg"
                         alt="pinterest"></a>
        <a href="#"><img src="views/icons/Youtube.svg"
                         alt="youtube"></a>
      </div>
    </nav>

    <header>
      <h1>PLANTS THAT SUIT YOU</h1>
      <a href="views/shop.php?species=All">Explore</a>
    </header>

    <article class="new-arrivals">
      <h2>new arrivals</h2>
      <a href="views/shop.php?species=All"
         class="see-more">see more <img src="views/icons/seemore.svg"
                                        alt="see more"></a>
      <div class="products"
           id="products">

          <?php
          require_once('./database/Settings.php');

          $pdo = Settings::getPDO();

          $sql = "SELECT * FROM product ORDER BY id DESC";

          $ps = $pdo->prepare($sql);

          $ps->execute();

          $getAllProducts = $ps->fetchAll(PDO::FETCH_ASSOC);

          for ($i = 0; $i < 4; $i+=2) {

              $img1 = $getAllProducts[$i]["product_image"];
              $product_name1 = $getAllProducts[$i]["product_name"];
              $product_price1 = $getAllProducts[$i]["product_price"];
              $product_id1 = $getAllProducts[$i]["id"];

              $img2 = $getAllProducts[$i+1]["product_image"];
              $product_name2 = $getAllProducts[$i+1]["product_name"];
              $product_price2 = $getAllProducts[$i+1]["product_price"];
              $product_id2 = $getAllProducts[$i+1]["id"];

          ?>

        <div class="product2">
          <div class="product">
            <a href="views/product.php?product=<?php echo $product_id1?>">
              <div class="image">
                <img src="<?php echo $img1?>"
                     alt="<?php echo $product_name1?>">
              </div>
              <p><?php echo $product_name1?></p>
              <p class="price"><?php echo $product_price1?>€</p>
            </a>
          </div>

          <div class="product">
            <a href="views/product.php?product=<?php echo $product_id2?>">
              <div class="image">
                <img src="<?php echo $img2?>"
                     alt="<?php echo $product_name2?>">
              </div>
              <p><?php echo $product_name2?></p>
              <p class="price"><?php echo $product_price2?>€</p>
            </a>
          </div>
        </div>
          <?php
          }
          ?>

      </div>
    </article>

    <article class="categories">
      <h2>categories</h2>
      <div class="cat-flex">
        <div class="cat-left">
          <a href="views/shop.php?species=Succulent">
            <div class="category cat1 succulent"
                 id="succulent"><p>Succulent</p></div>
          </a>
          <a href="views/shop.php?species=Palm tree">
            <div class="category cat1 palm"
                 id="palm"><p>Palm tree</p></div>
          </a>
        </div>
        <div class="cat-right">
          <a href="views/shop.php?species=Monstera">
            <div class="category cat2 monstera"
                 id="monstera"><p>Monstera</p></div>
          </a>
          <a href="views/shop.php?species=Alocasia">
            <div class="category cat2 alocasia"
                 id="alocasia"><p>Alocasia</p></div>
          </a>
          <a href="views/shop.php?species=Pothos">
            <div class="category cat2 pothos"
                 id="pothos"><p>Pothos</p></div>
          </a>
        </div>
      </div>
    </article>

    <hr>

    <article class="about">
      <div class="photo">
        <a href="views/about.php"
           class="photo-text">Our story</a>
      </div>

      <div class="text">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
           magna aliqua. </p>
        <a href="views/about.php">More about us</a>
      </div>
    </article>

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
          <a href="views/shop.php?species=All">shop</a>
          <a href="views/shop.php?species=Alocasia">alocasia</a>
          <a href="views/shop.php?species=Succulent">succulent</a>
          <a href="views/about.php">about</a>
          <a href="views/shop.php?species=Palm tree">palm tree</a>
          <a href="#">FAQ</a>
          <a href="views/login-form.php">log in</a>
          <a href="views/shop.php?species=Pothos">pothos</a>
          <a href="#">terms & conditions</a>
          <a href="views/contact.php">contact</a>
          <a href="views/shop.php?species=Monstera">monstera</a>
          <a href="#">privacy policy</a>
        </div>
      </div>
      <div class="social">
        <p>social</p>
        <div class="social-flex">
          <a href="#"><img src="views/icons/Instagram.svg"
                           alt="instagram"><span class="social-link">@paraiso_plants</span></a>
          <a href="#"><img src="views/icons/facebook.svg"
                           alt="facebook"><span class="social-link">Paraíso plants</span></a>
          <a href="#"><img src="views/icons/Pinterest.svg"
                           alt="pinterest"><span class="social-link">@paraiso_plants</span></a>
          <a href="#"><img src="views/icons/Youtube.svg"
                           alt="youtube"><span class="social-link">Paraíso plants</span></a>
        </div>
      </div>
    </footer>
    <script src="views/js/script.js"></script>
  </body>
</html>
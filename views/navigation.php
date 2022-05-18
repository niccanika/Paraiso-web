<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<nav>
    <div class="burger">
        <a href="#"
           class="toggle-nav">
            <img src="icons/menu_phone.svg"
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
        <button class="btn-search"><img src="icons/search.svg"
                                        alt="Search"></button>
    </form>

    <div class="left">
        <ul>
            <li><a href="shop.php?species=All">shop</a></li>
            <li><a href="about.php">about us</a></li>
            <li><a href="contact.php">contact</a></li>
        </ul>
    </div>

    <a href="../index.php"
       id="logo">Paraíso</a>

    <div class="right">
        <ul>
            <?php
            if(isset($_SESSION['user_login'])){
                ?>
                <li><a href="user_profile.php"
                       id="profile">My profile</a></li>
                <?php
            }else{
                ?>
                <li><a href="login-form.php"
                       id="login">LOG IN</a></li>
                <?php
            }
            ?>
            <li><a href="#"><img src="icons/search.svg"
                                 alt="Search"
                                 id="search"></a></li>
            <li><a href="favourites.php"><img src="icons/heart.svg"
                                 alt="Favourites"></a></li>
            <li><a href="shopping-cart.php"><img src="icons/shopping_cart.svg"
                                 alt="Shopping cart"></a></li>
        </ul>
    </div>
    <div class="social-nav">
        <a href="#"><img src="icons/Instagram.svg"
                         alt="instagram"></a>
        <a href="#"><img src="icons/facebook.svg"
                         alt="facebook"></a>
        <a href="#"><img src="icons/Pinterest.svg"
                         alt="pinterest"></a>
        <a href="#"><img src="icons/Youtube.svg"
                         alt="youtube"></a>
    </div>
</nav>

<!--<a href="javascript:history.go(-1)"-->
<!--   class="go-back"><img src="icons/arrow.svg"-->
<!--                        alt="back">-->
<!--    <p>back</p></a>-->

</body>
</html>
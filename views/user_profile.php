<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile | Paraíso</title>
    <link rel="stylesheet"
          href="../css/shop_style.css">
    <link rel="stylesheet"
          href="../css/user_profile_style.css">
</head>
<body>
<?php
include_once "../helpers/userDBInfo.php";
if (isset($_SESSION["user_login"])){
?>
<div class="container">
    <article style="position: relative; top: 5rem; left: 2rem">
        <h1>Hi,
            <?php
            echo $result["name"];
            }
            ?>!</h1>
        <ul>
            <li><a href="edit-profile-form.php">Edit profile info</a></li>
            <li><a href="change-password-form.php">Change password</a></li>
            <li><a href="favourites.php">Favourites</a></li>
        </ul>
        <?php
        if ($result["role"] == 1) {
            ?>
            <h3>admin stuff</h3>
            <ul>
                <li><a href="product-management.php">Product management</a></li>
                <li><a href="user-management.php">User management</a></li>
<!--                <li><a href="#">Favourites</a></li>-->
            </ul>
            <?php
        }
        ?>

        <a href="../servlets/logout.php">
            <button>log out</button>
        </a>
    </article>
</div>

<script>
    // document.getElementById("login").style.display= 'none';
    document.getElementById("profile").style.display = 'none';
</script>
</body>
</html>

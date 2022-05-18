<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Paraíso</title>
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">-->
    <link rel="stylesheet"
          href="../css/contact_style.css">
</head>
<body>
<div class="container">
    <?php
    include_once "navigation.php";

    if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
        echo "<p style='position: relative; top: 31rem; width: 100%; text-align: center; color: crimson'>Wrong Email / Password</p>";
    }
    ?>
    <a href="javascript:history.go(-1)"
       class="go-back"><img src="icons/arrow.svg"
                            alt="back">
        <p>back</p></a>
    <article>
        <div class="contact-form">
        <h1 style="font-family: 'Playfair Display', serif; font-size: 3rem">Login</h1>
        <form action="/servlets/login-user.php" method="post" id="login-form">
            <label for="email">Email</label>
            <input type="email"
                   id="email"
                   name="email"
                   placeholder="Email">
            <label for="password">Password</label>
            <input type="password"
                   id="password"
                   name="password"
                   placeholder="Password">
            <input type="submit" name="login" value="Login" class="button is-dark is-size-4">
        </form>
        <a href="register-form.php" style="font-weight: bold; font-size: 1.2rem; position: relative; bottom: 5rem">Create new account</a>
        </div>
    </article>
</div>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="/js/jq_messages.js"></script>
<script>
    $("#login-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        }
    });

    document.getElementById("login").style.display= 'none';
</script>
</body>
</html>

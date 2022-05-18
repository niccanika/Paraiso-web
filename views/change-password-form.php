<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile | Paraíso</title>
    <link rel="stylesheet"
          href="../css/contact_style.css">
</head>
<body>
<div class="container">
    <?php
    //    session_start();
    //    include_once "navigation.php";
    include_once "../helpers/userDBInfo.php";

    if (isset($_GET["msg"]) && $_GET["msg"] == 'updated') {
        echo "<p style='position: relative; top: 15rem; width: 100%; text-align: center; color: green'>Password changed</p>";
    }
    ?>

    <a href="javascript:history.go(-1)"
       class="go-back"><img src="icons/arrow.svg"
                            alt="back">
        <p>back</p></a>

    <article>
        <div class="contact-form">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 3rem">Update your info</h1>
            <form action="/servlets/change-password.php" method="post" id="change-password-form">
                <label for="password" style="display: inline-block; margin-bottom: 0">New password</label>
                <input type="password"
                       id="password"
                       name="password"
                       placeholder="••••••••">
                <label for="confirm_password" style="display: inline-block; margin-bottom: 0">Confirm password</label>
                <input type="password"
                       id="confirm_password"
                       name="confirm_password"
                       placeholder="••••••••">
                <input type="submit" name="change-password" value="change password" class="button">
            </form>
        </div>
    </article>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="/js/jq_messages.js"></script>
<script>
    document.getElementById("profile").style.display= 'none';

    $("#change-password-form").validate({
        rules: {
            password: {
                required: true,
                minlength: 8

            },
            confirm_password: {
                required: true,
                equalTo : '[name="password"]'
            }
        },
        messages: {
            confirm_password: {
                equalTo: "Passwords don't match"
            }
        }
    });
</script>
</body>
</html>
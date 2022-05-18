<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Paraíso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet"
          href="../css/contact_style.css">
</head>
<body>
<div class="container">
<!--    <a href="#"-->
<!--       id="logo" style="margin: .3rem auto; font-family: 'Playfair Display', serif; font-size: 2.5rem">Paraíso</a>-->
<!--    --><?php
//    include_once "navigation.php"
    if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
        echo "<p style='position: relative; top: 12rem; width: 100%; text-align: center; color: crimson'>Email already used</p>";
    }
//    ?>
    <a href="javascript:history.go(-1)"
       class="go-back" style="margin-top: 1rem;"><img src="icons/arrow.svg"
                            alt="back">
        <p>back</p></a>
    <article>
    <div class="contact-form">
        <h1 style="font-family: 'Playfair Display', serif; font-size: 3rem">Register</h1>
        <form action="/servlets/register-user.php" method="post" id="register-form">
            <label for="name">Name</label>
            <input type="text"
                   id="name"
                   name="name"
                   placeholder="Name"
                   required>
            <label for="email">Email address</label>
            <input type="email"
                   id="email"
                   name="email"
                   placeholder="Email address"
                   required>
            <label for="password">Password</label>
            <input type="password"
                   id="password"
                   name="password"
                   placeholder="password"
                   required>
            <label for="confirm_password">Confirm password</label>
            <input type="password"
                   id="confirm_password"
                   name="confirm_password"
                   placeholder="confirm password"
                   required>
            <label for="age">Age</label>
            <input type="number"
                   id="age"
                   name="age"
                   min="0"
                   max="140"
                   placeholder="age"
                   required>
<!--            <label for="role">Role</label>-->
<!--            <div class="select" style="width: 35%;">-->
<!--                <select name="role" id="role">-->
<!--                    <option value="" disabled selected>Select your role</option>-->
<!--                    <option value="1">Admin</option>-->
<!--                    <option value="0">User</option>-->
<!--                </select>-->
<!--            </div>-->
            <input class="button is-dark is-size-4" type="submit" value="Register">
        </form>
    </div>
    </article>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="/js/jq_messages.js"></script>
<script>
    $("#register-form").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8

            },
            confirm_password: {
                required: true,
                equalTo : '[name="password"]'
            },
            age: {
                required: true
            },
            role: {
                required: true
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

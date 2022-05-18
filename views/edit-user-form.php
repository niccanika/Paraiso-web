<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit user | Paraíso</title>
    <link rel="stylesheet"
          href="../css/contact_style.css">
</head>
<body>
<div class="container">
    <?php
        session_start();
    //    include_once "navigation.php";
//    include_once "../helpers/userDBInfo.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/database/Settings.php";

    $id = intval($_GET['id']);

    $pdo = Settings::getPDO();
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmnt = $pdo->prepare($sql);
    $stmnt->execute(
        array(
            ':id' => $id
        ));

    $result = $stmnt->fetch(PDO::FETCH_ASSOC);

    if (isset($_GET["msg"]) && $_GET["msg"] == 'updated') {
        echo "<p style='position: relative; top: 15rem; width: 100%; text-align: center; color: green'>Info updated</p>";
    }
    ?>

    <a href="javascript:history.go(-1)"
       class="go-back"><img src="icons/arrow.svg"
                            alt="back">
        <p>back</p></a>

    <article>
        <div class="contact-form">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 3rem">Update user info</h1>
            <form action="/servlets/edit-user.php?id=<?= $id?>" method="post" id="edit-user-form">
                <label for="name" style="display: inline-block; margin-bottom: 0">Name</label>
                <input type="text"
                       id="name"
                       name="name"
                       value="<?php echo $result["name"] ?>">
                <label for="email" style="display: inline-block; margin-bottom: 0">Email</label>
                <input type="email"
                       id="email"
                       name="email"
                       value="<?php echo $result["email"] ?>">
                <label for="age" style="display: inline-block; margin-bottom: 0">Age</label>
                <input type="number"
                       id="age"
                       name="age"
                       min="0"
                       max="140"
                       value="<?php echo $result["age"] ?>">
                <div class="select" style="width: 35%;">
                    <select name="role" id="role">
                        <option value="1" <?php if ($result["role"]=="1"){echo 'selected';}?>>Admin</option>
                        <option value="0" <?php if ($result["role"]=="0"){echo 'selected';}?>>User</option>
                    </select>
                </div>
                <input type="submit" name="edit" value="edit" class="button">
            </form>
        </div>
    </article>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="/js/jq_messages.js"></script>
<script>
    // document.getElementById("profile").style.display= 'none';

    $("#edit-user-form").validate({
        rules: {
            name: {
                minlength: 3
            },
            email: {
                email: true
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


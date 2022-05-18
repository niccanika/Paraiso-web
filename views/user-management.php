<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User management | Paraíso</title>
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">-->
    <link rel="stylesheet"
          href="../css/shop_style.css">
    <style>
        h1 {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .table-wrapper{
            margin: 10px 70px 70px;
            box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.1 );
        }

        table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        td, th {
            text-align: center;
            padding: 8px;
        }

        td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }
    </style>
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
        <h1 style="margin-top: 3rem">User management</h1>

    </article>
    <article class="table-wrapper">
        <?php
        require_once('../database/Settings.php');

        $pdo = Settings::getPDO();

        $sql = "SELECT * FROM users";

        $ps = $pdo->prepare($sql);

        $ps->execute();

        $users = $ps->fetchAll(PDO::FETCH_ASSOC);

        if (isset($_GET["msg"]) && $_GET["msg"] == 'deleted') {
            echo "<p style='position: relative; top: -2rem; width: 100%; text-align: center; color: darkred'>User deleted</p>";
        }

        if (isset($_GET["msg"]) && $_GET["msg"] == 'updated') {
            echo "<p style='position: relative; top: -2rem; width: 100%; text-align: center; color: green'>Info updated</p>";
        }
?>
        <table class="table has-background-white">
            <th class="is-size-5">ID</th>
            <th class="is-size-5">Name</th>
            <th class="is-size-5">Email</th>
            <th class="is-size-5">Age</th>
            <th class="is-size-5">Role</th>
            <th class="is-size-5">Created at</th>
            <th></th>
            <?php
            foreach ($users as $user){ ?>
                <tr>
                    <td class="is-size-5"><?=$user["id"]?></td>
                    <td class="is-size-5"><?=$user["name"]?></td>
                    <td class="is-size-5"><?=$user["email"]?></td>
                    <td class="is-size-5"><?=$user["age"]?></td>
                    <td class="is-size-5"><?=$user["role"]?></td>
                    <td class="is-size-5"><?=$user["created_at"]?></td>
                    <td class="is-size-5">
                        <a style="margin-right: 1rem" href="/views/edit-user-form.php?id=<?=$user["id"]?>"><i class="fa-solid fa-pen"></i></a>
                        <a href="/servlets/delete-user.php?id=<?=$user["id"]?>"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php }?>
        </table>

    </article>
</div>
<script src="https://kit.fontawesome.com/7c26fe3118.js" crossorigin="anonymous"></script>
</body>
</html>
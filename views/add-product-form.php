<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add product | Paraíso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet"
          href="../css/contact_style.css">
</head>
<body>
<?php
session_start();
?>
<div class="container">
    <!--    <a href="#"-->
    <!--       id="logo" style="margin: .3rem auto; font-family: 'Playfair Display', serif; font-size: 2.5rem">Paraíso</a>-->
<!--      --><?php
//    //    include_once "navigation.php"
//    if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
//        echo "<p style='position: relative; top: 12rem; width: 100%; text-align: center; color: crimson'>Email already used</p>";
//    }
//    //    ?>
    <a href="javascript:history.go(-1)"
       class="go-back" style="margin-top: 1rem;"><img src="icons/arrow.svg"
                                                      alt="back">
        <p>back</p></a>
    <article>
        <div class="contact-form">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 3rem">Add new product</h1>
            <form action="/servlets/add-product.php" method="post" id="add-product-form" enctype="multipart/form-data">
                <label for="product_name">Product name</label>
                <input type="text"
                       id="product_name"
                       name="product_name"
                       placeholder="Product name"
                       required>
                <div class="file is-fullwidth">
                    <label for="product_image" class="file-label" style="display: inline-block">
                        <span class="file-label">
                            Upload product image
                          </span>
                        <input type="file" class="file-input" name="product_image" id="product_image" onchange="loadFile(event)">
                        <span class="file-cta">
                          <span class="file-icon">
                            <i class="fas fa-upload"></i>
                          </span>

                        </span>
                    </label>
                </div>
                <img id="preview" src="" alt="Preview image" width="33%" style="margin: auto">
                <div class="field">
                    <label for="product_price" style="display: inline-block; margin-bottom: 0">Price</label>
                    <div class="control has-icons-right">
                    <input type="number"
                           step="0.01"
                           id="product_price"
                           name="product_price"
                           placeholder="10"
                           required>
                        <span class="icon is-right is-large has-text-dark">
                            <i class="fa-thin fa-euro-sign fas fa-2x"></i>
                        </span>
                    </div>
                </div>
                <label for="product_category">Product category</label>
                <div class="select" style="width: 35%;">
                    <select name="product_category" id="product_category">
                        <option value="" disabled selected>Select category</option>
                        <option value="Alocasia">Alocasia</option>
                        <option value="Palm tree">Palm tree</option>
                        <option value="Pothos">Pothos</option>
                        <option value="Monstera">Monstera</option>
                        <option value="Succulent">Succulent</option>
                    </select>
                </div>
                <input class="button is-dark is-size-4" type="submit" name="add-product" value="Add product">
            </form>
        </div>
    </article>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="/js/jq_messages.js"></script>
<script src="https://kit.fontawesome.com/7c26fe3118.js" crossorigin="anonymous"></script>
<script>
    $("#add-product-form").validate({
        rules: {
            product_name: {
                required: true,
                minlength: 3
            },
            product_image: {
                required: true
            },
            product_price: {
                required: true,
                min: 2,
                max: 120
            },
            product_category: {
                required: true
            }
        }
    });

    const loadFile = (event) => {
        const output = document.getElementById('preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    }
</script>
</body>
</html>

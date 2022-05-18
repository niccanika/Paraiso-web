<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Product | Paraíso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet"
          href="../css/product_style.css">
</head>
<body>
<?php
session_start()
?>
<div class="container" style="margin: 0">
    <?php
    include_once "navigation.php"
    ?>

    <a href="javascript:history.go(-1)"
       class="go-back"><img src="icons/arrow.svg"
                            alt="back">
        <p>back</p></a>

    <article style="margin-left: 3rem; width: 100vw;">

        <div class="product">

            <?php
            require_once('../database/Settings.php');

            $pdo = Settings::getPDO();

            //            $product = "SELECT * FROM product WHERE id = .$_GET['product'].";
            //            $sql = "SELECT * FROM product WHERE id = $_GET['product']";
            $id = $_GET['product'];
            $sql = 'SELECT * FROM product WHERE id=:id';
            $ps = $pdo->prepare($sql);
            $ps->execute(array(':id' => $id));

            $product = $ps->fetch(PDO::FETCH_ASSOC);

            ?>
            <div class="product-text">
                <h2>Edit / delete product</h2>
            <div class="contact-form">
                <form action="/servlets/update-product.php?product=<?php echo $_GET["product"]?>" method="post" id="edit-product-form" enctype="multipart/form-data">
                    <label for="product_name" style="display: inline-block; margin-bottom: 0">Product name</label>
                    <input type="text"
                           id="product_name"
                           name="product_name"
                           class="input"
                           value="<?php echo $product["product_name"] ?>">
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
                                   value="<?php echo $product["product_price"] ?>"
                                   class="input"
                                   required>
                            <span class="icon is-right is-large has-text-dark">
                            <i class="fa-solid fa-euro-sign"></i>
                        </span>
                        </div>
                    </div>
                    <label for="product_category">Product category</label>
                    <div class="select" style="width: 35%;">
                        <select name="product_category" id="product_category">
                            <option value="Alocasia" <?php if ($product["product_category"]=="Alocasia"){echo 'selected';}?>>Alocasia</option>
                            <option value="Palm tree" <?php if ($product["product_category"]=="Palm tree"){echo 'selected';}?>>Palm tree</option>
                            <option value="Pothos" <?php if ($product["product_category"]=="Pothos"){echo 'selected';}?>>Pothos</option>
                            <option value="Monstera" <?php if ($product["product_category"]=="Monstera"){echo 'selected';}?>>Monstera</option>
                            <option value="Succulent" <?php if ($product["product_category"]=="Succulent"){echo 'selected';}?>>Succulent</option>
                        </select>
                    </div>
                    <div class="buttons" style="margin-top: 2rem">
                        <input type="submit" name="edit" value="edit product" class="button">
                        <input type="submit" name="delete" value="delete product" class="button">
                    </div>
                </form>
            </div>
<!--                <div class="buttons">-->
<!--                    <button>edit product</button>-->
<!--                    <button>delete product</button>-->
<!---->
<!--                </div>-->
            </div>

            <div class="product-img">
                <img src="<?php echo substr($product["product_image"], 6)?>"
                     alt="<?php echo $product["product_name"]?>">
            </div>

        </div>

    </article>
</div>

<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="/js/jq_messages.js"></script>
<script src="https://kit.fontawesome.com/7c26fe3118.js" crossorigin="anonymous"></script>
<script>
    $("#edit-product-form").validate({
        rules: {
            product_name: {
                required: true,
                minlength: 3
            },
            product_image: {
                required: false
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
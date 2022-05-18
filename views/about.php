<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>About us | Paraíso</title>
    <!--    <link rel="stylesheet"-->
    <!--          href="style/main.css">-->
    <link rel="stylesheet"
          href="../css/about_style.css">

  </head>
  <body>
  <?php
  session_start()
  ?>
    <div class="container">
        <?php
        include_once "navigation.php"
        ?>

      <a href="javascript:history.go(-1)"
         class="go-back"><img src="icons/arrow.svg"
                              alt="back">
        <p>back</p></a>

      <article>
        <div class="text">
          <h1>Hi friends,</h1>
          <div class="text-p">
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
               rem
               aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
               explicabo.
               Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
               dolores eos qui ratione voluptatem sequi nesciunt.</p>
            <p>
              Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
              numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad
              minima
              veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
              consequatur</p>
          </div>

        </div>
        <img src="photos/couple.png"
             alt="couple">
      </article>
    </div>
    <script src="js/script.js"></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Contact | Paraíso</title>
    <link rel="stylesheet"
          href="../css/contact_style.css">
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
        <div class="info">
          <h1>Contact us</h1>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10333.011495616845!2d-103.37020233610106!3d20.658681881524913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428adfc4176fc69%3A0xe2512f94e3d7b0e2!2sPara%C3%ADso%2C%20Del%20Fresno%2C%2044900%20Guadalajara%2C%20Jal.%2C%20M%C3%A9xico!5e0!3m2!1ses!2ssk!4v1637265101841!5m2!1ses!2ssk"
                  height="450"
                  style="border:0;"
                  allowfullscreen=""
                  loading="lazy"></iframe>
          <div class="text-info">
            <div class="item">
              <p class="bold">Address</p>
              <p>Del Fresno <br>
                 44900 Guadalajara <br>
                 Jalisco <br>
                 México</p>
            </div>
            <div class="phone-mail">
              <div class="item">
                <p class="bold">Email address</p>
                <p>hello@paraiso.mx</p>
              </div>
              <div class="item">
                <p class="bold">Phone number</p>
                <p>+52 126 432 7589</p>
              </div>
            </div>
          </div>
          <div class="social-media small">
            <p>Follow us</p>
            <div class="social-flex">
              <a href="#"><img src="icons/Instagram.svg"
                               alt="instagram"><span class="social-link">@paraiso_plants</span></a>
              <a href="#"><img src="icons/facebook.svg"
                               alt="facebook"><span class="social-link">Paraíso plants</span></a>
              <a href="#"><img src="icons/Pinterest.svg"
                               alt="pinterest"><span class="social-link">@paraiso_plants</span></a>
              <a href="#"><img src="icons/Youtube.svg"
                               alt="youtube"><span class="social-link">Paraíso plants</span></a>
            </div>
          </div>
        </div>
        <div class="contact-form">
          <form action="#">
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
            <label for="phone">Phone number (optional)</label>
            <input type="tel"
                   id="phone"
                   name="phone"
                   pattern="+[0-9]{2}-[0-9]{3}-[0-9]{3}-[0-9]{4}"
                   placeholder="Phone number (optional)"
                   maxlength="16"
                   minlength="13">
            <label for="message">Message</label>
            <textarea name="message"
                      id="message"
                      placeholder="Message"
                      required></textarea>
            <button>Send message</button>
          </form>
        </div>
      </article>

      <div class="social-media big">
        <p>Follow us</p>
        <div class="social-flex">
          <a href="#"><img src="icons/Instagram.svg"
                           alt="instagram"><span class="social-link">@paraiso_plants</span></a>
          <a href="#"><img src="icons/facebook.svg"
                           alt="facebook"><span class="social-link">Paraíso plants</span></a>
          <a href="#"><img src="icons/Pinterest.svg"
                           alt="pinterest"><span class="social-link">@paraiso_plants</span></a>
          <a href="#"><img src="icons/Youtube.svg"
                           alt="youtube"><span class="social-link">Paraíso plants</span></a>
        </div>
      </div>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>
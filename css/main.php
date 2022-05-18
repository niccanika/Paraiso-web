@import url("https://fonts.googleapis.com/css2?family=Chivo:wght@300;400&family=Playfair+Display:wght@400;500;600;700;900&display=swap");
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  background-color: #FFFCF7;
  color: #1A2421;
  font-family: "Chivo", sans-serif;
}
body a {
  color: #1A2421;
  text-decoration: none;
}

hr {
  margin: 4.75vw auto;
  width: 20%;
  border: 0;
  height: 2px;
  background: #1A2421;
}

nav {
  display: flex;
  position: fixed;
  width: 100%;
  justify-content: space-between;
  background-color: #FFFCF7;
}
nav .left, nav .right, nav #logo {
  width: 33.33%;
}
nav .left ul, nav .right ul {
  margin: 0;
  padding: 0;
  display: flex;
}
nav .right ul {
  justify-content: flex-end;
}
nav .left li, nav .right li {
  list-style: none;
  padding: 1rem;
  display: block;
  font-weight: lighter;
  font-size: 1.25rem;
}
nav .left a {
  position: relative;
}
nav .left a:after {
  content: "";
  position: absolute;
  width: 100%;
  transform: scaleX(0);
  height: 1px;
  bottom: 0;
  left: 0;
  background-color: #1A2421;
  transform-origin: bottom left;
  transition: transform 200ms ease-out;
}
nav .left a:hover:after {
  transform: scaleX(1);
  transform-origin: bottom left;
}
nav .toggle-nav {
  display: none;
}
nav .social-nav {
  display: none;
}
nav .search-mobile {
  display: none;
}
nav #logo {
  font-family: "Playfair Display", serif;
  text-decoration: none;
  font-size: 2.5rem;
  text-align: center;
}

header {
  width: 100%;
  height: 100vh;
  text-align: center;
  font-size: 2.2rem;
  background-image: url("../photos/header.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  display: flex;
  justify-content: center;
  align-content: center;
  flex-wrap: wrap;
}
header h1 {
  width: 100%;
  padding: 1.44rem;
  font-family: "Playfair Display", serif;
  font-weight: normal;
}
header a {
  display: block;
  font-size: 1.8rem;
  width: 18.75rem;
  height: 3.84rem;
  margin: auto;
  padding: 0.8rem;
  background-color: #2A462E;
  font-weight: lighter;
  color: #FFFCF7;
}

article {
  padding-top: 3.063rem;
}
article h2 {
  display: inline-block;
  font-family: "Playfair Display", serif;
  font-size: 3rem;
  font-weight: normal;
  margin: 2rem 0 0 8rem;
  padding: 1rem 0;
}

.new-arrivals .see-more {
  font-size: 1.5rem;
  padding: 0 1rem;
  font-weight: lighter;
  text-decoration: underline;
}
.new-arrivals .products {
  display: flex;
  justify-content: center;
  gap: 1.92rem;
  width: 86%;
  margin: 0 auto;
}
.new-arrivals .product2 {
  display: flex;
  gap: 1.92rem;
}
.new-arrivals .product {
  width: 18.125rem;
}
.new-arrivals .product p {
  display: inline-block;
  font-size: 1.25rem;
  padding-top: 1rem;
}
.new-arrivals .product .image {
  width: 18.125rem;
  height: 18.125rem;
  overflow: hidden;
  border-radius: 24px;
}
.new-arrivals .product .image img {
  width: 100%;
}
.new-arrivals .product .price {
  float: right;
  font-weight: lighter;
}

.categories .cat-flex {
  display: flex;
  justify-content: center;
  gap: 1.92rem;
  width: 86%;
  margin: 1rem auto 0 auto;
}
.categories .category {
  border-radius: 24px;
  background-repeat: no-repeat;
  background-size: cover;
  display: flex;
  align-items: flex-end;
  transition: background-size 500ms ease-out;
}
.categories .category:hover {
  background-size: 150%;
  background-position: center;
}
.categories .category p {
  margin: 2.25rem 3.25rem;
}
.categories .cat1 {
  width: 38.88rem;
  height: 25.125rem;
  margin: 0 0 1.92rem 0;
}
.categories .cat2 {
  width: 38.88rem;
  height: 16.313rem;
}
.categories #succulent {
  background-image: url("../photos/succulent.jpg");
}
.categories #palm {
  background-image: url("../photos/palm.jpg");
}
.categories #monstera {
  background-image: url("../photos/monstera.jpg");
  height: 15.984rem;
}
.categories #alocasia {
  background-image: url("../photos/alocasia.jpg");
  background-position: center;
  margin: 1.92rem 0;
}
.categories #pothos {
  background-image: url("../photos/pothos.jpg");
  background-position: center;
  height: 15.984rem;
}

.about {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 1.92rem;
  width: 86%;
  margin: 0 auto;
}
.about .photo {
  width: 38.88rem;
  height: 33.757rem;
  background-image: url("../photos/about.jpg");
  background-size: cover;
}
.about .photo .photo-text {
  display: none;
}
.about .photo .about-text {
  display: none;
}
.about .text {
  width: 38.88rem;
  padding: 6.067rem;
  font-weight: lighter;
  font-size: 1.2rem;
}
.about .text a {
  display: inline-block;
  padding-top: 3.034rem;
  text-decoration: underline;
  font-weight: normal;
}

.newsletter {
  text-align: center;
  width: 37.5rem;
  margin: 0 auto 10rem auto;
}
.newsletter h2 {
  margin-bottom: 1.44rem;
  margin-left: 0;
}
.newsletter p {
  font-weight: lighter;
  font-size: 1.2rem;
  margin: 0.96rem;
}
.newsletter form {
  width: 100%;
  margin: auto;
}
.newsletter form * {
  display: block;
}
.newsletter form input {
  width: 100%;
  border: none;
  border-bottom: 1px solid #1A2421;
  padding: 1.44rem 0.48rem 0.48rem 0.48rem;
  margin-top: 0.96rem;
  background-color: #FFFCF7;
  font-size: 1.2rem;
  font-family: "Chivo", sans-serif;
  font-weight: lighter;
}
.newsletter form label {
  display: none;
}
.newsletter form button {
  width: 18.75rem;
  height: 3.84rem;
  margin: 3.994rem auto;
  padding: 0.8rem;
  background-color: #2A462E;
  font-family: "Chivo", sans-serif;
  font-weight: lighter;
  font-size: 1.8rem;
  color: #FFFCF7;
  border: none;
  text-align: center;
  display: block;
  cursor: pointer;
}

footer {
  width: 86%;
  margin: 0 auto;
  border-top: 2px solid #1A2421;
  display: flex;
}
footer p {
  font-size: 1.2rem;
}
footer .sitemap, footer .social {
  margin: 4.186rem;
}
footer .sitemap {
  width: 50%;
}
footer .sitemap-flex {
  display: flex;
  flex-wrap: wrap;
  margin-top: 0.96rem;
}
footer .sitemap-flex a {
  width: 33.33%;
  margin: 0.672rem 0;
  font-weight: lighter;
}
footer .social {
  width: 20%;
}
footer .social-flex {
  margin-top: 0.96rem;
  font-weight: lighter;
  display: flex;
  flex-wrap: wrap;
}
footer .social-flex a {
  width: 100%;
  padding: 0.288rem 0;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  gap: 0.48rem;
  margin: 0.3rem 0;
}

@media (max-width: 1300px) {
  .new-arrivals .products {
    gap: 3%;
  }
  .new-arrivals .product2 {
    gap: 3%;
  }

  .categories .cat-flex {
    width: 70%;
  }
  .categories .cat1, .categories .cat2 {
    width: 40vw;
  }
}
@media (max-width: 1250px) {
  hr {
    width: 35%;
    margin: 5rem auto 4.75vw auto;
  }

  nav .burger {
    width: 33.33%;
  }
  nav .toggle-nav {
    display: block;
    padding: 1rem;
    width: 1rem;
  }
  nav .left, nav #login {
    display: none;
    width: 100%;
  }
  nav .left {
    position: absolute;
    left: 2rem;
  }
  nav .left ul {
    flex-direction: column;
    margin-top: 5rem;
  }
  nav .social-nav {
    display: none;
    justify-content: center;
    gap: 3rem;
    width: 100%;
    position: absolute;
    top: 27rem;
  }
  nav .social-active {
    display: flex;
  }
  nav #login {
    font-weight: bold;
    position: absolute;
    left: 3rem;
    top: 20rem;
  }
  nav .active {
    display: block;
  }

  .active-nav {
    height: 35rem;
  }

  header {
    gap: 5rem;
  }
  header h1 {
    font-size: 4rem;
  }

  article h2 {
    margin: 1rem 0 0 2.5rem;
    padding: 0.5rem 0;
  }

  .new-arrivals {
    width: 100%;
  }
  .new-arrivals .products {
    width: 100%;
    flex-wrap: wrap;
    margin-top: 2rem;
    column-gap: 3%;
  }
  .new-arrivals .products .product {
    margin-top: 1rem;
  }
  .new-arrivals .product2 {
    column-gap: 3%;
    flex-direction: column;
  }

  .categories .cat-flex {
    flex-direction: column;
    align-items: center;
    gap: 0.7rem;
    width: 100%;
  }
  .categories #alocasia {
    margin: 0;
  }
  .categories .cat-left, .categories .cat-right {
    display: flex;
    flex-direction: column;
    gap: 0.7rem;
  }
  .categories .cat1, .categories .cat2 {
    height: 15.984rem;
    width: 90vw;
    margin-bottom: 0;
  }
  .categories #succulent, .categories #palm {
    background-position: center;
  }

  .about .text {
    display: none;
  }
  .about .photo {
    display: flex;
    align-items: center;
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("../photos/about.jpg");
    background-size: cover;
  }
  .about .photo .photo-text {
    width: 100%;
    display: inline-block;
    text-align: center;
    text-decoration: underline;
    color: #FFFCF7;
    font-size: 2rem;
  }

  .newsletter {
    margin: 2rem auto 8rem auto;
  }

  footer {
    flex-direction: column;
  }
  footer .sitemap, footer .social {
    margin: 3rem;
    width: 100%;
  }
  footer .social-flex {
    width: 85%;
  }
  footer .social-flex a {
    width: 50%;
    justify-content: center;
  }
}
@media (max-width: 800px) {
  body {
    overflow-x: hidden;
  }
}
@media (max-width: 650px) {
  hr {
    width: 65%;
    margin: 5rem auto 2rem auto;
  }

  nav .right ul li {
    margin: 1.2rem 0.5rem;
    padding: 0;
  }
  nav .right img {
    width: 1.3rem;
  }
  nav .left {
    top: 5rem;
  }
  nav .social-nav {
    top: 40rem;
  }
  nav .search-mobile {
    position: absolute;
    left: 3rem;
    display: none;
    width: 80%;
    margin: 7rem 0;
    height: 2rem;
    justify-content: center;
  }
  nav .search-mobile button {
    width: 10%;
    height: 2.2rem;
    border-style: none;
    font-size: 20px;
    outline: none;
    cursor: pointer;
    border-bottom: 1px solid #1A2421;
    background-color: transparent;
  }
  nav .search-mobile input {
    width: 90%;
    border: none;
    border-bottom: 1px solid #1A2421;
    padding: 1.44rem 3rem 0.7rem 0;
    background-color: #FFFCF7;
    font-size: 1.25rem;
    font-family: "Chivo", sans-serif;
    font-weight: lighter;
  }
  nav .search-mobile label {
    display: none;
  }
  nav #login {
    top: 25rem;
  }
  nav #search {
    display: none;
  }
  nav .search-active {
    display: flex;
  }

  .active-nav {
    height: 100%;
  }

  header h1 {
    font-size: 2.5rem;
  }

  article h2 {
    font-size: 2rem;
    margin: 2rem 0 0 1.25rem;
  }

  .new-arrivals .see-more {
    display: block;
    margin: 0.1rem 0.28rem 1rem 0.28rem;
  }
  .new-arrivals .product2 {
    flex-direction: column;
  }

  .about {
    width: 90vw;
  }
  .about .photo {
    height: 19rem;
  }

  .newsletter {
    width: 20rem;
  }

  footer .sitemap {
    margin: 2rem 0.9rem;
  }
  footer .sitemap-flex {
    justify-content: space-between;
  }
  footer .sitemap-flex a {
    width: 44%;
  }
  footer .social {
    margin: 0 0.9rem 2rem 0.9rem;
  }
  footer .social-flex {
    width: 90%;
    justify-content: space-between;
  }
  footer .social-flex a {
    width: 10%;
    gap: 0;
  }
  footer span {
    display: none;
  }
}

/*# sourceMappingURL=main.css.map */

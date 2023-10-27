<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Organic Farming</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">


  <!-- Bootstrap core CSS -->
  <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">

  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>


</head>
<body>

  <header class="l-header">
    <nav class="nav bd-grid">
      <div>
        <a href="index.php" class="nav__logo">BRAINIHACK</a>
      </div>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item"><a href="index.php#portfolio" class="nav__link">Our Products</a></li>
          <li class="nav__item"><a href="cart.php" class="nav__link">Your Cart</a></li>
          <li class="nav__item"><a href="logout.php" class="nav__link">Sign Out</a></li>

        </ul>
      </div>

      <div class="nav__toggle" id="nav-toggle">
        <i class='bx bx-menu'></i>
      </div>
    </nav>
  </header>

  <main>



    <section class="portfolio section" id="portfolio">
      <h2 class="section-title">Vegetables</h2>

      <div class="portfolio__container bd-grid">
        <?php
        $conn = mysqli_connect("localhost", "root", "");
        $query = "SELECT * FROM organicfarming.iteams WHERE itemType = 'vegetable';";
        $result = mysqli_query($conn, $query);
        $parsedQuery = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach($parsedQuery as $key => $value)
        {
          $itemtype = $value['itemType'];
          $image = $value["imageUrl"];
          $iteamName = $value["itemName"];
          $description = $value["description"];
          $itemId = $value["itemId"];
          $price = $value['priceperKg'];
          ?>
          <div class="portfolio__img">

            <img src="<?php echo $image ?>" />

            <!-- <div class="portfolio__link">
              <a href="#" class="portfolio__link-name"><?php echo $iteamName ?></a>
            </div> -->
            <div class="card-body">
              <p class="card-text"><?php echo $description ?></p>
              <br>
              <p style="font-weight: bold; text-align:center;">₹<?php echo $price?> per Kg</p>
              <br>
              <div class="d-flex justify-content-between align-items-center">
                <form action="transactions.php" method="POST" class="btn-group">
                  <input type="hidden" name="fruitsorvegs" value="<?php echo $itemtype ?>">
                  <input type="number" name="quantity" placeholder="No. of Kg">
                  <button type="submit" name = "transaction" value ="true" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  <input type="hidden" name="itemId" value="<?php echo $itemId ?>">
                </form>

              </div>
            </div>
          </div>
          <?php
        }
        ?>
        
      </div>
    </section>
  </main>
  <footer class="footer section">
    <div class="footer__container bd-grid">
      <div class="footer__data">
        <h2 class="footer__title"><a href="About Us/index.html">Developers</a></h2>
        <p class="footer__text">Prakhar</p>
      
      </div>

      <div class="footer__data">
        <h2 class="footer__title">EXPLORE</h2>
        <ul>
          <li><a href="#home" class="footer__link">Home</a></li>
          <li><a href="#about" class="footer__link">About</a></li>
          <li><a href="#skills" class="footer__link">Why us?</a></li>
          <li><a href="#portfolio" class="footer__link">Our Products</a></li>
          <li><a href="#Contact" class="footer__link">Feedback</a></li>

        </ul>
      </div>
      
      <div class="footer__data">
        <h2 class="footer__title">FOLLOW</h2>
        <a href="#" class="footer__social"><i class='bx bxl-facebook' ></i></a>
        <a href="#" class="footer__social"><i class='bx bxl-instagram' ></i></a>
        <a href="#" class="footer__social"><i class='bx bxl-twitter' ></i></a>
      </div>


    </div>
  </footer>




  <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>

<?php
    function validate()
    {
        $conn = mysqli_connect("localhost","root","");
        $cookie_username = $_COOKIE['username'];
        $cookie_token = $_COOKIE['token'];
        $query = "SELECT * FROM organicfarming.cookietable WHERE username = '$cookie_username' AND token = '$cookie_token';";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_assoc($result);
            $rembember = $row['rembember'];
            $time = $row['createdon'];
            if($rembember == 'true')
            {
                if(time()< $time+(60*60*24*5))
                {
                  return true;
                }
                else
                {
                    return false;
                }
            }
            else if($rembember == 'false')
            {
                if(time()< $time+(60*60*24))
                {
                  return true;
                }
                else
                {
                    return false;
                }
            }
      }
      else{
        echo "Login failed";
      }
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <title>Hack-O-Uplift</title>

</head>
<body>
    <!--===== HEADER =====-->
    <header class="l-header">
        <nav class="nav bd-grid">
            <div>
                <?php
                    if(isset($_COOKIE['username']))
                    {
                    ?>
                    <a href="index.php" class="nav__logo">Welcome ! <?php echo $_COOKIE['username']?></a>
                    <?php
                    }
                ?>
                <?php
                    if(!isset($_COOKIE['username']))
                    {
                    ?>
                    <a href="index.php" class="nav__logo">BRAINIHACK</a>
                    <?php
                    }
                ?>
            </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active">Home</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="#skills" class="nav__link">Why us?</a></li>
                    <?php
                        if(isset($_COOKIE['username']))
                        {
                        ?>
                        <li class="nav__item"><a href="#portfolio" class="nav__link">Our Products</a></li>
                        <li class="nav__item"><a href="cart.php" class="nav__link">Your Cart</a></li>
                        <li class="nav__item"><a href="#contact" class="nav__link">Feedback</a></li>
                        <li class="nav__item"><a href="logout.php" class="nav__link">Sign Out</a></li>
                        <?php
                        }
                    ?>
                    <?php
                        if(!isset($_COOKIE['username']))
                        {
                        ?>
                        <li class="nav__item"><a href="./login.php" class="nav__link">Login</a></li>
                        <li class="nav__item"><a href="./signup.php" class="nav__link">Sign-Up</a></li>
                        <?php
                        }
                    ?>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--===== HOME =====-->
        <section class="home" id="home">
            <div class="home__container bd-grid">
                <h1 class="home__title">ORGANIC FARMING</h1>


                <img src="assets/img/garden.png" alt="" class="home__img">
            </div>
        </section>

        <!--===== ABOUT =====-->
        <section class="about section" id="about">
            <h2 class="section-title">About</h2>

            <div class="about__container bd-grid">
                <div class="about__img">
                    <img src="assets/img/farm.png" alt="">
                </div>

                <div>
                    <h2 class="about__subtitle">GOAL !</h2>
                    <span class="about__profession">As an Engineer,</span>
                    <p class="about__text">
                    Our aim is to make people aware of Organic Farming which helps people to understand convenience of safe, pesticide-free, healthy green and fresh vegetables. Conducive to a routine of physical exercise, clean air and being close to nature.</p>

                    <div class="about__social">
                        <a href="#" class="about__social-icon"><i class='bx bxl-linkedin' ></i></a>
                        <a href="#" class="about__social-icon"><i class='bx bxl-github' ></i></a>
                        <a href="#" class="about__social-icon"><i class='bx bxl-dribbble' ></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!--===== SKILLS =====-->
        <section class="skills section" id="skills">
            <h2 class="section-title">Our Stratergy !</h2>

            <div class="skills__container bd-grid">
                <div class="skills__box">

                    <h3 class="skills__subtitle">Organicallygrown</h3>
                    <span class="skills__name">✅ Convenience of safe, pesticide-free, healthy green and fresh vegetables</span>
                    <span class="skills__name">✅ Filled with the goodness of nature! </span>
                    <span class="skills__name">✅ Dine with all-natural, organic food!</span>



                    <h3 class="skills__subtitle">Benifits for Consumers</h3>
                    <span class="skills__name">✅ A credible guarantee that the food they are buying has been grown organically. As there are no high third-party certification costs, the price remains affordable for the consumer and fair for the farmer.</span>
                    <span class="skills__name">✅ The chance to become more involved in the food-growing process e.g. by visiting farms and participating in the peer review process to make sure the farmer is complying with organic standards.</span>

                    <h3 class="skills__subtitle">Benifits for Buyers/Traders</h3>
                    <span class="skills__name">✅ Buyers can participate in PGS processes e.g. farm reviews, discussions about standards so that they know who grows the food they sell and they can also assure their customers of its organic origin.</span>
                    <span class="skills__name">✅ Attract more customers to their markets as interest in organic rises.</span>
                    
                    

                    
                </div>

                <div class="skills__img">
                    <img src="assets/img/OF.png" alt="">
                </div>
            </div>
        </section>

        <!--===== PORTFOLIO =====-->
        <?php
            if(isset($_COOKIE['username']))
            {

            ?>
            <section class="portfolio section" id="portfolio">
                <h2 class="section-title">Our Products</h2>

                <div class="portfolio__container bd-grid">
                    <div class="portfolio__img">
                        <img src="assets/img/vege.jpg" >

                        <div class="portfolio__link">
                            <a href="vegetable.php" class="portfolio__link-name">Vegetables</a>
                        </div>
                    </div>
                    <div class="portfolio__img">
                        <img src="assets/img/fruit.jpg" >

                        <div class="portfolio__link">
                            <a href="fruits.php" class="portfolio__link-name">Fruits</a>
                        </div>
                    </div>
                    <div class="portfolio__img">
                        <img src="assets/img/kit.png">

                        <div class="portfolio__link">
                            <a href="#" class="portfolio__link-name">Compact-Kit</a>
                        </div>
                    </div>
                    <div class="portfolio__img">
                        <img src="assets/img/manure.png" >

                        <div class="portfolio__link">
                            <a href="#" class="portfolio__link-name">Manures</a>
                        </div>
                    </div>
                    <div class="portfolio__img">
                        <img src="assets/img/terrace.jpeg" alt="">

                        <div class="portfolio__link">
                            <a href="#" class="portfolio__link-name">Terrace-Kit</a>
                        </div>
                    </div>
                    <div class="portfolio__img">
                        <img src="assets/img/Seed.png" alt="">

                        <div class="portfolio__link">
                            <a href="#" class="portfolio__link-name">View details</a>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            }
        ?>
        <!--===== CONTACT =====-->
        <section class="contact section" id="contact">
            <h2 class="section-title">Feedback</h2>

            <div class="contact__container bd-grid">
                <div class="contact__info">
                    <h3 class="contact__subtitle">EMAIL</h3>
                    <span class="contact__text">example@email.com</span>

                    <h3 class="contact__subtitle">PHONE</h3>
                    <span class="contact__text">9874XXXX21</span>

                    <h3 class="contact__subtitle">Location</h3>
                    <span class="contact__text">India Ltd.</span>
                </div>

                <form action="" class="contact__form">
                    <div class="contact__inputs">
                        <input type="text" placeholder="Name" class="contact__input">
                        <input type="mail" placeholder="Email" class="contact__input">
                    </div>

                    <textarea name="" id="" cols="0" rows="10" placeholder="Type your feedback here..." class="contact__input"></textarea>

                    <input type="submit" value="Submit" class="contact__button">
                </form>
            </div>
        </section>
    </main>

    <!--===== FOOTER =====-->
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
                    <?php
                        if(isset($_SESSION['username']))
                        {
                        ?>
                        <li><a href="#portfolio" class="footer__link">Our Products</a></li>
                        <?php
                        }
                    ?>
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

    <!--===== SCROLL REVEAL =====-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--===== MAIN JS =====-->
    <script src="assets/js/main.js"></script>
</body>
</html>

<?php

include ('./connection.php');
include ('functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedas Sports</title>
    <link rel="stylesheet" href="home.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/images/logo1.png">
</head>

<body>

    <div class="container">

        <div class="header">

            <video autoplay muted loop id="background_video">
                <source src="images/background.mp4" type="video/mp4">
            </video>

            <video autoplay muted loop id="mobile_background_video">
                <source src="images/g.mp4" type="video/mp4">
            </video>

            <div class="head">

                <div class="top">
                    <div class="logo">
                        <img src="images/logo.png" alt="logo">
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">
                            <?php
                            // Username display
                            if (!isset($_SESSION['username'])) {
                                echo "Guest";
                            } else {
                                echo $_SESSION['username'];
                            }
                            ?>
                        </button>
                        <div class="dropdown-content">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo "<a href='cart.php'>My Cart</a>";
                                echo "<a href='login_register/profile.php'>My Profile</a>";
                                echo "<a href='./login_register/logout.php'>Logout</a>";

                            } else {
                                echo "<a href='cart.php'>My Cart</a>";
                                echo "<a href='./login_register/login.php'>Login</a>";
                                echo "<a href='login_register/register.php'>Register</a>";
                            }
                            ?>
                        </div>
                    </div>

                </div>

                <div class="burger-menu" id="burger-menu">
                          <i class="fas fa-bars"></i>
                </div>

                <div class="mobile-menu">
                    <div class="nav" id="mobile-menu">
                        <ul>
                            <li onclick="location.href='home.php';">home</li><hr>
                            <li onclick="location.href='product.php';">product</li><hr>
                            <li onclick="location.href='about_us.php';">about us</li><hr>
                            <li onclick="location.href='contact_us.php';">contact us</li>
                        </ul>
                    </div>
                </div>



            </div>
            
            <div class="content">

                <div class="waviy">
                    <span style="--i:1">V</span>
                    <span style="--i:2">E</span>
                    <span style="--i:3">D</span>
                    <span style="--i:4">A</span>
                    <span style="--i:5">S</span>
                    <span style="--i:6"></span>
                    <span style="--i:7">s</span>
                    <span style="--i:8">p</span>
                    <span style="--i:9">o</span>
                    <span style="--i:10">r</span>
                    <span style="--i:11">t</span>
                    <span style="--i:12">s</span>
                </div>

            </div>

        </div>



        <div class="product_page">

            <h3>NEW ARRIVALS</h3>

            <div class="new_product">

                <div class="product">

                    <img src="images/al_rihla.jpg" class="dp">

                    <h4>Adidas AL RIHLA League Football - FIFA 2023</h4>
                    <p>
                        This Adidas football has passed with FIFA test on circumference, weight, rebound, and water
                        absorption. It has graphics on it inspired by the FIFA world cup. It also comes with a butyl
                        bladder that requires less pumping and more playing.
                    </p>

                </div>

                <div class="product">

                    <img src="images/bat.jpg" class="dp">

                    <h4>CA PLUS SM-18</h4>
                    <p>
                        7 STAR CRICKET BAT TOP QUALITY PAKISTAN BRANDED HARD BALL BAT ENGLISH WILLOW CRICKET BAT
                    </p>

                </div>

                <div class="product">

                    <img src="images/basketball.jpg" class="dp">

                    <h4>Spalding TF-1000</h4>
                    <p>
                        This indoor basketball will be Spalding’s choice for high school and college athletes. You
                        will find this basketball in a good amount of high schools and colleges around the country.
                        The composite basketball surface will provide for a soft touch and will allow for great
                        handling with personal use or in gameplay.
                    </p>

                </div>

                <div class="product">

                    <img src="images/futsal_shoe.jpg" class="dp">

                    <h4>K-Leather Upper</h4>
                    <p>
                        Crazy Adidas Predator 20+ 'Animal' Special-Edition Boots Released Most Expensive Boot Ever
                        Footy Headlines
                    </p>

                </div>

            </div>

            <div class="product_page_link">
                <p><a href="product.php">View all Products <i class="fa-solid fa-arrow-right"></i></a></p>
            </div>


        </div>


        <div class="footer">
            <div class="row">
                <div class="col">
                    <img src="images/logo.png" alt="logo" class="foot_logo">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, ipsa necessitatibus sint
                        eligendi perspiciatis repudiandae est ullam officia officiis hic id fugit, reiciendis cumque
                        rem, iusto mollitia sequi excepturi natus.
                    </p>
                </div>

                <div class="col">
                    <h3>Office <div class="underline"><span></span></div>
                    </h3>
                    <p>Purnachandi Road</p>
                    <p>Jawalakhel, Lalitpur</p>
                    <p>Bagmati province, Nepal</p>
                    <p class="email_id">vedascollege@gmail.com</p>
                    <h4>0123456789</h4>
                </div>
                <div class="col">
                    <h3>Links<div class="underline"><span></span></h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h3>feedback<div class="underline"><span></span></h3>
                    <form>
                        <i class="fa-regular fa-message"></i>
                        <input type="text" placeholder="What should we change!!!" required>
                        <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                    </form>

                    <div class="social_icons">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                </div>
            </div>
            <hr>
            <p class="copyright">Developed by <b>Dinesh Bajgain </b>& <b>Sadishan Khadka</b>.</p>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var burgerMenu = document.getElementById('burger-menu');
            var mobileMenu = document.getElementById('mobile-menu');

            burgerMenu.addEventListener('click', function() {
                if (mobileMenu.style.display === "block") {
                    mobileMenu.style.display = "none";
                } else {
                    mobileMenu.style.display = "block";
                }
            });
        });
    </script>

</body>

</html>

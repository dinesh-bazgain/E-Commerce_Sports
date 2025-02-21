<?php
include ('./includes/connect.php');
include ('functions/common_functions.php');

session_start();


?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="/images/logo1.png">
        <link rel="stylesheet" href="product.css?v=<?php echo time(); ?>">
    </head>

    <body>
        
        <div class="header">

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

            </div>
            
            <div class="burger-menus" id="burger-menu">
                      <i class="fas fa-bars"></i>
            </div>

            <div class="mobile-menus">
                <div class="nav" id="mobile-menu">
                    <ul>
                        <li onclick="location.href='home.php';">home</li> <hr>
                        <li onclick="location.href='product.php';">product</li><hr>
                        <li onclick="location.href='about_us.php';">about us</li><hr>
                        <li onclick="location.href='contact_us.php';">contact us</li>
                    </ul>
                </div>
            </div>

            <div class="brand_head">
                <h2>Available Brands:</h2>
                <ul>
                    <!-- This is to connect and fetch by admin in db and show in front end -->
                    <div class="brands">
                        <div class="brand_name">
                            <a href="product.php">Show all</a>
                            <?php
                                getbrands(); 
                            ?>
                        </div>
                    </div>
                </ul>
            </div>
            <!-- calling cart function -->
            <?php
            cart(); ?>
            <div class="product">
                <div class="product_info">
                    <!-- fetching productts -->
                    <?php
                    getProducts();
                    get_unique_brands(); ?>
                </div>
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
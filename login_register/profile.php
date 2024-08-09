<?php
session_start();
include ('../includes/connect.php');
include ('../functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css?v=<?php echo time(); ?>">

</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="../images/logo.png" alt="Logo">
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
                        echo "<a href='../cart.php'>My Cart</a>";
                        echo "<a href='profile.php'>My Profile</a>";
                        echo "<a href='logout.php'>Logout</a>";

                    } else {
                        echo "<a href='../cart.php'>My Cart</a>";
                        echo "<a href='login.php'>Login</a>";
                        echo "<a href='register.php'>Register</a>";
                    }
                    ?>
                </div>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="../home.php">Home</a></li>
                    <li><a href="../product.php">Product</a></li>
                    <li><a href="../about_us.php">About Us</a></li>
                    <li><a href="../contact_us.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <?php
            if (isset($_SESSION['username'])) {
                get_user_order();
                if (isset($_GET['my_orders'])) {
                    include ('my_orders.php');
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
<?php
include ('includes/connect.php');
include ('functions/common_functions.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/images/logo1.png">
    <link rel="stylesheet" href="cart.css?v=<?php echo time(); ?>">
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
        <div class="mobile_bar">
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
        </div>
        <!-- calling cart function -->
        <?php
        cart();
        ?>

        <h1>Your Cart Contents:</h1>
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table>

                        <!-- code to display data from db -->
                        <?php
                        // global $con;
                        $ip = getIPAddress();
                        $total_price = 0;
                        $cart_query = "Select * from `cart_details` where ip_address = '$ip'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "  <thead>
                                <tr>
                                    <th>Name of Product</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>price</th>
                                    <th>Select</th>
                                    <th colspan='2'>Status</th>
    
                                </tr>
                            </thead>
                            <tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "Select * from `products` where product_id='$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price["product_price"]);
                                    $price_table = $row_product_price['product_price'];
                                    $product_name = $row_product_price['product_name'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;

                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $product_name ?>
                                        </td>
                                        <td><img class="dbimg" src="./admin/product_images/<?php echo $product_image1 ?>" alt="">
                                        </td>
                                        <td><input type="text" name="quantity"></td>
                                        <?php
                                        $get_ip_add = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['quantity'];
                                            $update_cart = "update `cart_details` set quantity = $quantities where ip_address = '$get_ip_add'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            $total_price = $total_price * $quantities;
                                        }
                                        ?>
                                        <!-- <td><input type="text" name="size"></td> -->
                                        <td>
                                            <?php echo $price_table ?>/-
                                        </td>
                                        <td><input type="checkbox" name="removeitems[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <input type="submit" value="Update item" name="update_cart">
                                            <input type="submit" value="delete item" name="delete_cart">
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        } else {
                            echo "<h2>The Cart is Empty! Please first add products to cart.</h2>";

                        }
                        ?>
                        </tbody>
                    </table>

                    <?php
                    $ip = getIPAddress();
                    $cart_query = "Select * from `cart_details` where ip_address = '$ip'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<div>
                            <h3>Total amount: Rs: <strong>$total_price</strong>/-</h3>
                            <input type='submit' value='Explore more Products' name='Explore_More_products'>
                            <button><a href='./login_register/checkout.php'>Payment Checkout</a></button>
                        </div>";
                    } else {
                        echo "No items in the cart.";

                    }
                    if (isset($_POST['Explore_More_products'])) {
                        echo "<script>window.open('product.php','_self' );</script>";
                    }

                    ?>
                    <!-- for total amount -->

            </div>
        </div>
        </form>
        <!-- functions to delete thte items -->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['delete_cart'])) {
                foreach ($_POST['removeitems'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "Delete from `cart_details` where product_id = $remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php', '_self')</script>";
                    }
                }
            }
        }

        echo $remove_item = remove_cart_item();
        ?>

    </header>

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
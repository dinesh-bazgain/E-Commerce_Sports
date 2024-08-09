<!-- <link rel="stylesheet" href="product.css"> -->

<?php

// geting products

function getProducts()
{
    global $con;
    if (!isset($_GET['brand'])) {
        $select_query = "Select * from `products` order by rand()";
        $result_query = mysqli_query($con, $select_query);

        echo "<div class='container'>";
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_description = $row['product_description'];
            $product_price = $row['product_price'];

            echo "<div class='card'>
                    <img src='./admin/product_images/$product_image1' alt='$product_name'>
                    <div class='imgbody'>
                        <h2>$product_name</h2>
                        <p>$product_description</p>
                        <h4>Price: Rs. $product_price/-</h4>
                        <a href='product.php?add_to_cart=$product_id'>Add to cart</a>
                    </div>
                </div>";
        }
        echo "</div>";
    }
}


//for brand filter//

function get_unique_brands()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "Select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2>This Brand is out of Stock Currently</h2>";
        } else {
            echo "<div class='brand_container'>";
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_description = $row['product_description'];
                $product_price = $row['product_price'];
                echo "<div class='card'>
                        <img class='productimage' src='./admin/product_images/$product_image1' alt='$product_name'/>
                        <div class='imgbody'>
                            <h2>$product_name</h2>
                            <p>$product_description</p>
                            <h4>Price: Rs. $product_price/-</h4>
                            <a href='product.php?add_to_cart=$product_id'>Add to cart</a>
                        </div>
                    </div>";
            }
            echo "</div>";
        }
    }
}


//for brands//
function getbrands()
{
    global $con;
    $select_brands = "Select * from `brands` order by brand_name";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_name = $row_data['brand_name'];
        $brand_id = $row_data['brand_id'];
        echo " <li><a href='product.php?brand=$brand_id'>$brand_name</a></li>";

    }
}


//for ipaddress// 
function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


//add to cart function//
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_details` where ip_address = '$ip' and product_id = $get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('THis item is already in cart')</script>";
            echo "<script>window.open('product.php','_self')</script";
        } else {
            $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id, '$ip',0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('The item is added in cart')</script>";
            echo "<script>window.open('product.php','_self')</script";

        }



    }
}



// function for cart items to display//

function cart_items()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address = '$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address = '$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);



    }
}



//get user order details//
function get_user_order()
{


    global $con;
    if (isset($_SESSION['username'])) {
        $user_name = $_SESSION['username'];
        $get_details = "SELECT * FROM `register` WHERE username = '$user_name'";
        $result_query = mysqli_query($con, $get_details);
        while ($row_query = mysqli_fetch_array($result_query)) {
            $user_id = $row_query['user_id'];
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "select * from `user_orders` where user_id = $user_id and order_status = 'pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if ($row_count > 0) {
                        echo "<div class='order-info'><h3>You have <span>$row_count</span> orders</h3>
                    <a href = 'profile.php?my_orders'>My Order Information</a></div>";


                    } else {
                        echo "<div class='order-info'><h3>You have no Pending Orders</h3>
                    <a href = '../product.php'>Shop now</a></div>";
                    }
                }
            }
        }
    }
}





?>

<style>
    .order-info {
        margin: 20px 0;
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        text-align: center;
    }

    .order-info h3 {
        margin: 0;
        font-size: 1.5em;
        color: #333;
    }

    .order-info h3 span {
        color: #e74c3c;
        font-weight: bold;
    }

    .order-info a {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .order-info a:hover {
        background-color: #2980b9;
    }
</style>
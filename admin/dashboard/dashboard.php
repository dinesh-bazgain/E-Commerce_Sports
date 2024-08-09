<?php
include ('../../includes/connect.php');
include ('../../functions/common_functions.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1,
        h3 {
            text-align: center;
        }

        .menu {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        .menu li {
            display: inline-block;
            margin-right: 20px;
        }

        .menu li a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;

            border: 1px solid #007bff;
            padding: 8px 16px;
            border-radius: 5px;
        }

        .menu li a:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="adminopt">
        <h1>Admin Dashboard</h1><br>
        <h3>Welcome Admin</h3><br>
        <ul class="menu">
            <li><a href="dashboard.php">Main Menu</a></li>
            <li><a href="add_products.php">Add Products</a></li>
            <li><a href="dashboard.php?view_products">View Products</a></li>
            <li><a href="dashboard.php?add_brand">Add Brands</a></li>
            <li><a href="dashboard.php?view_brands">View Brands</a></li>
            <li><a href="dashboard.php?view_users">View Users</a></li>
            <li><a href="dashboard.php?view_orders">View Orders</a></li>
        </ul>
    </div>

    <div>
        <?php
        if (isset($_GET['add_brand'])) {
            include ('add_brand.php');
        }
        if (isset($_GET['view_products'])) {
            include ('view_products.php');
        }

        ?>
        <?php
        if (isset($_GET['edit_products'])) {
            include ('edit_products.php');
        }
        if (isset($_GET['delete_product'])) {
            include ('delete_product.php');
        }
        if (isset($_GET['view_users'])) {
            include ('view_users.php');
        }
        if (isset($_GET['delete_users'])) {
            include ('delete_users.php');
        }
        if (isset($_GET['view_brands'])) {
            include ('view_brands.php');
        }
        if (isset($_GET['delete_brand'])) {
            include ('delete_brand.php');
        }
        if (isset($_GET['view_orders'])) {
            include ('view_orders.php');
        }
        if (isset($_GET['delete_order'])) {
            include ('delete_order.php');
        }
        ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
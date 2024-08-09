<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        form {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .productimage {
            max-width: 200px;
            height: auto;
            margin-top: 10px;
        }

        .menu li {
            display: inline-block;
            margin-right: 20px;
        }

        li a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;

            border: 1px solid #007bff;
            padding: 8px 16px;
            border-radius: 5px;
        }

        li a:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <li><a href="dashboard.php">Main Menu</a></li>

    <h1>Edit Products</h1>

    <?php
    if (isset($_GET['edit_products'])) {
        $edit_id = $_GET['edit_products'];
        $get_data = "Select * from `products` where product_id = $edit_id";
        $result = mysqli_query($con, $get_data);
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['product_name'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_description = $row['product_description'];
        $product_price = $row['product_price'];
        //fetching brands//
        $select_brand = "Select * from `brands`";
        $result_brand = mysqli_query($con, $select_brand);
        $row_brand = mysqli_fetch_assoc($result_brand);
        $brand_name = $row_brand['brand_name'];

    }
    ?>
    <div>
        <h1>Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data"><br><br><br><br>
            <div>
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" value="<?php echo $product_name ?>" name="product_name"
                    required="required">
            </div>
            <div>
                <label for="product_description">Product description</label>
                <input type="text" id="product_description" value="<?php echo $product_description ?>"
                    name="product_description" required="required">
            </div>
            <div>
                <label for="product_brands">Brand Name</label>
                <select name="product_brands">
                    <option name="product_brands" value="<?php echo $brand_name ?>">
                        <?php echo $brand_name ?>
                    </option>
                    <?php
                    $select_brand_all = "Select * from `brands`";
                    $result_brand_all = mysqli_query($con, $select_brand_all);
                    while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                        $brand_id = $row_brand_all['brand_id'];
                        $brand_name = $row_brand_all['brand_name'];
                        echo " <option value='$brand_id'>$brand_name</option>";
                    }
                    ;
                    ?>

                </select>
            </div>

            <div>
                <label for="product_image1">Product image</label>
                <div>
                    <input type="file" id="product_image1" name="product_image1" required="required">
                    <img src="../product_images/<?php echo $product_image1 ?>" alt="" class="productimage">
                </div>
            </div>
            <div>
                <label for="product_price">Product price</label>
                <input type="text" id="product_price" value="<?php echo $product_price ?>" name="product_price"
                    required="required">
            </div>
            <div>
                <input type="submit" name="edit_product" value="Update Product">
            </div>
        </form>
    </div>
    <!-- editing products saving -->
    <?php

    if (isset($_POST['edit_product'])) {
        $product_name = $_POST['product_name'];
        $product_brands = $_POST['product_brands'];
        $product_image1 = $_FILES['product_image1']['name'];
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $product_description = $_POST['product_description'];
        $product_price = $_POST['product_price'];

        //checking for empty fields//
        if (
            $product_name == '' or $product_description == '' or $product_brands == '' or $product_price == '' or
            $product_image1 == ''
        ) {
            echo "<script>alert('Please fill all the fields')</script>";
        } else {
            move_uploaded_file($temp_image1, "../product_images/$product_image1");
            // query to update products//
            $update_product = "update `products` set product_name='$product_name', brand_id='$product_brands',
            product_image1='$product_image1', product_description='$product_description', product_price='$product_price'
            where product_id= $edit_id";
            $result_update = mysqli_query($con, $update_product);
            if ($result_update) {
                echo "<script>alert('Product information updated successfully.')</script>";
                echo "<script>window.open('./view_products.php','_self')</script>";
            }
        }
    }


    ?>
</body>

</html>
<?php
include ('../../includes/connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>View Products</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 0 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: 2px solid black;
        max-width: 100%;
        /* Add this line to limit the maximum width of the table */
        overflow-x: auto;
        /* Add this line to enable horizontal scrolling */
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        white-space: nowrap;
        /* Add this line to prevent table cells from wrapping */
    }

    th {
        background-color: goldenrod;
    }

    .dbimg {
        width: 100px;
        object-fit: contain;
        justify-content: space-around;
        display: flex;
        align-items: center;
    }

    /* Add this block to center the table */
    table {
        margin: 0 auto;
    }

    /* Add this block to reduce the font size of the table cells */
    td,
    th {
        font-size: 0.9rem;
    }
</style>


<body>
    <h1>All products</h1>


    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $get_products = "select * from `products`";
            $result = mysqli_query($con, $get_products);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $number++;
                ?>
                <tr>
                    <td>
                        <?php echo $number; ?>
                    </td>
                    <td>
                        <?php echo $product_name; ?>
                    </td>
                    <td><img src='../product_images/<?php echo $product_image1; ?>' class='dbimg'></td>
                    <td>
                        <?php echo $product_price; ?>/-
                    </td>
                    <td><a href='dashboard.php?edit_products=<?php echo $product_id ?>'><i
                                class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='dashboard.php?delete_product=<?php echo $product_id ?>'><i
                                class='fa-solid fa-trash'></i></a></td>

                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>
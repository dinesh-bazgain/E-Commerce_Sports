<?php

include ('../includes/connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="my_orders.css?v=<?php echo time(); ?>">

</head>

<body>
    <div class="container">
        <h2>My Orders</h2>
        <?php
        $user_name = $_SESSION['username'];
        $get_user = "select * from `register` where username = '$user_name'";
        $result = mysqli_query($con, $get_user);
        $row_fetch = mysqli_fetch_assoc($result);
        $user_id = $row_fetch['user_id'];
        ?>
        <table>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Order Number</th>
                    <th>Amount</th>
                    <th>Total products</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $get_order_details = "select * from `user_orders` where user_id= $user_id";
                $result_orders = mysqli_query($con, $get_order_details);
                $number = 1;
                while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                    $order_id = $row_orders['order_id'];
                    $amount = $row_orders['amount'];
                    $total_products = $row_orders['total_products'];
                    $invoice_number = $row_orders['invoice_number'];
                    $order_date = $row_orders['order_date'];
                    echo "<tr>
                        <td>$number</td>
                        <td>$order_id</td>
                        <td>$amount</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                    </tr>";
                    $number++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
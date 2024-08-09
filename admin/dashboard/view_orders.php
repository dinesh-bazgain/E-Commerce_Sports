<style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;
    }

    th,
    td {
        border: 2px solid #ddd;
        padding: 6px;
        text-align: left;
    }

    th {
        background-color: #f0f0f0;
        color: #333;
        font-size: 14px;
    }

    td {
        font-size: 12px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .fa-trash-button {
        color: red;
    }
</style>

<h3>All Orders</h3>
<table>
    <thead>

        <tr>
            <th>S.N</th>
            <th>User ID</th>
            <th>Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_orders = "select * from `user_orders`";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);
        if ($row_count == 0) {
            echo "<h2>No Orders yet</h2>";
        } else {
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $user_id = $row_data['user_id'];
                $amount = $row_data['amount'];
                $invoice_number = $row_data['invoice_number'];
                $total_products = $row_data['total_products'];
                $order_date = $row_data['order_date'];

                $number++;

                ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $user_id; ?></td>
                    <td><?php echo $amount; ?></td>
                    <td><?php echo $invoice_number; ?></td>
                    <td><?php echo $total_products; ?></td>
                    <td><?php echo $order_date; ?></td>

                    <td><a href='dashboard.php?delete_order=<?php echo $order_id ?>'><i
                                class='fa-solid fa-trash fa-trash-button'></i></a></td>
                </tr>
                <?php
            }
        }
        ?>

    </tbody>
</table>
<?php
if (isset($_GET['delete_order'])) {
    $delete_order_query = $_GET['delete_order'];
    $delete_query_order = "delete from `user_orders` where order_id = $delete_order_query";
    $result_order = mysqli_query($con, $delete_query_order);
    if ($result_order) {
        echo "<script>alert('Order Deleted sucessfully')</script>";
        echo "<script>window.open('./dashboard.php?view_orders','_self')</script>";
    }
}
?>
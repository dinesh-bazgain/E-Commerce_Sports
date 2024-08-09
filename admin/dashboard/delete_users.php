<?php
error_reporting(0);
ini_set('display_errors', 0);


if (isset($_GET['delete_users'])) {
    $user_id = $_GET['delete_users'];
    $delete_users = "delete from `register` where user_id = $user_id";
    $result_users = mysqli_query($con, $delete_users);
    if ($result_users) {
        echo "<script>alert('User Deleted successfully.')</script>";
        echo "<script>window.open('dashboard.php?delete_users','_self')</script>";
    }
}
?>
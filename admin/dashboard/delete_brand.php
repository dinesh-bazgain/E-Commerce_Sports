<?php
if (isset($_GET['delete_brand'])) {
    $delete_brand = $_GET['delete_brand'];
    $delete_query = "delete from `brands` where brand_id = $delete_brand";
    $result = mysqli_query($con, $delete_query);
    if ($result) {
        echo "<script>alert('Brand Deleted sucessfully')</script>";
        echo "<script>window.open('./dashboard.php?view_brands','_self')</script>";
    }
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
    }

    h2 {
        margin-top: 50px;
    }



    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .input-group-text {
        width: 120px;
        text-align: left;
    }

    input[type="text"] {
        width: calc(100% - 140px);
    }

    input[type="submit"] {
        margin-top: 15px;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<?php
include ('../../includes/connect.php');
if (isset($_POST['add_brand'])) {
    $brand_name = $_POST['brand_name'];

    $select_query = "Select * from `brands` where brand_name='$brand_name'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This Brand is already present !')</script>";

    } else {
        $insert_query = "insert into `brands` (brand_name) values ('$brand_name')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been added successfully')</script>";

        }
    }
}

?>

<h2>Add New brands to the collection !</h2>


<form action="" method="post">
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Brand Name</span>
        <input type="text" class="form-control" aria-label="Sizing example input" name="brand_name"
            aria-describedby="inputGroup-sizing-default">
    </div>
    <div>
        <input type="submit" class="form-control" aria-label="Sizing example input" value="Add Brand" name="add_brand">
    </div>
</form>
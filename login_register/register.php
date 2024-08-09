<?php
include ('../functions/common_functions.php');
include ('../includes/connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedas Sports</title>
    <link rel="stylesheet" href="register.css?v=<?php echo time(); ?>">

</head>

<body>
    <div class="logo">
        <img src="../images/logo.png" alt="logo">
    </div>

    <div class="content">

        <h2>Create a New Account</h2>
        <p>It's quick and easy.</p>
        <hr>

        <form action="" method="post">
            <input type="text" placeholder="First Name" name="firstname" class="first_name" required>
            <input type="text" class="last_name" name="lastname" placeholder="Last Name" required> <br>
            <input type="text" class="username" name="username" placeholder="Username" required> <br>
            <input type="text" name="email" placeholder="Email or Mobile Number" class="email_phone" required><br>
            <input type="password" name="password" placeholder="New Password" required class="password"><br>
            <br>
            <hr>
            <div class="sign_up">
                <input type="submit" value="signup" name="user_signup">
            </div>
        </form>

        <div class="account">
            <a href="login.php">Already have an account?</a>
        </div>

    </div>
</body>

</html>

<?php
if (isset($_POST['user_signup'])) {
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_ip = getIPAddress();


    // same email repeating
    $select_query = "Select * from `register` where email='$user_email' or username = '$user_name' ";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Email or username is already taken')</script>";

    } else {// inserting in db
        $insert_query = "Insert into `register` (firstname,lastname,username,email,password,user_ip)
        values ('$user_firstname','$user_lastname','$user_name','$user_email','$hash_password','$user_ip')";
        $sql_execute = mysqli_query($con, $insert_query);
        echo "<script>alert('New user registered sucessfully')</script>";

    }


    //not logged in but cart selected and clicked registered after selecting item//

    $select_cart_items = "Select * from `cart_details` where ip_address = '$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $_SESSION['username'] = $user_name;
        echo "<script>alert('You have some items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('login.php','_self')</script>";

    }
}
?>
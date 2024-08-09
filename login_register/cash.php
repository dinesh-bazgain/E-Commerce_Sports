<?php
include ('../includes/connect.php');
include ('../functions/common_functions.php');
@session_start();
$user_ip = getIPAddress();
$get_user = "Select * from `register` where user_ip = '$user_ip'";
$result = mysqli_query($con, $get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cash.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container online">
        <div class="heading">ONLINE</div>
        <p>Our online service is currently down</p>
    </div>
    <div class="container offline">
        <div class="headingof">OFFLINE</div>
        <div class="cod">
            <a href="order.php?user_id=<?php echo $user_id ?>">PAY COD</a>
        </div>
    </div>
</body>

</html>
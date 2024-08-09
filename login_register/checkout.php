<?php
@session_start();
include ('../includes/connect.php'); // Ensure session is started
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedas Sports Store</title>
    <link rel="stylesheet" href="login.css">
    <div>
        <?php
        if (!isset($_SESSION['username'])) {
            header("Location: login.php");
        } else {
            header("Location: cash.php");
        }
        ?>
    </div>
    </div>
    </body>

</html>
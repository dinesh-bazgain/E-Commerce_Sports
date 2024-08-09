<?php

session_start();
// to remove prevoiusly looged in acc
$_SESSION = array();
session_destroy();
header("location: login.php");
exit();
?>
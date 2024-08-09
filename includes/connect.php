<?php

$con = mysqli_connect('localhost', 'root', '', 'vedasdb');

if (!$con) {
    die (mysqli_error($con));
}
?>
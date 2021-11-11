<?php
    //all the variables defined here are accessible in all the files that include this one
    date_default_timezone_set('Asia/Kolkata'); 
    $con = new mysqli('remotemysql.com', '9XeEWd7zyf', 'DXGxhUwIhF', '9XeEWd7zyf') or die("Could not connect to mysql" . mysqli_error($con));
?>
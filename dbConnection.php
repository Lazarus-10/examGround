<?php
    //all the variables defined here are accessible in all the files that include this one
    date_default_timezone_set('Asia/Kolkata'); 
    $con = new mysqli('remotemysql.com', 'faTFw1caOi', 'aTjT7J1OAP', 'faTFw1caOi') or die("Could not connect to mysql" . mysqli_error($con));
?>
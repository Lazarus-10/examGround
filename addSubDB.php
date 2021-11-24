<?php
include_once 'dbConnection.php';
session_start();
$email = $_SESSION['email'];

if(isset($_SESSION['email']) && @$_GET['q'] == 1){
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];
    $sub3 = $_POST['sub3'];
    $sub4 = $_POST['sub4'];
    $sub5 = $_POST['sub5'];
    
    $q = mysqli_query($con, "INSERT INTO subjects VALUES  ('$email', '1' , '$sub1', '$sub2' ,'$sub3', '$sub4', '$sub5')") or die(mysqli_error($con));
    header("location:account.php?q=1");
}
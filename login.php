<?php
	session_start();
	if(isset($_SESSION["email"])){
		session_destroy();
	}
	include_once 'dbConnection.php';
	$ref=@$_GET['q'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$email = stripslashes($email);
	$email = addslashes($email);
	$password = stripslashes($password); 
	$password = addslashes($password);
	$password=md5($password); 
	$q = mysqli_query($con,"SELECT name, is_verified FROM students WHERE email = '$email' and password = '$password'") or die('Error');
	$count=mysqli_num_rows($q);

	$q2 = mysqli_query($con,"SELECT * FROM subjects WHERE email = '$email'") or die(mysqli_error($con));
	$r2 = mysqli_num_rows($q2);

	if($count==1){
		$result = mysqli_fetch_array($q);
		if($result['is_verified'] == 1){
			$name = $result['name'];
			$_SESSION["name"] = $name;
			$_SESSION["email"] = $email;
			if($r2 == 0){
				header("location:addSub.php?q=1");
			}else{
				header("location:account.php?q=1");
			}
		}else{
			header("location:$ref?w=E-Mail Not Verified!!!");
		}
	}
	else
		header("location:$ref?w=Invalid Username or Password");

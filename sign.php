<?php
include_once 'dbConnection.php';
ob_start();
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code){
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'exam.ground.123@gmail.com';                     //SMTP username
        $mail->Password   = 'Khan@786';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('exam.ground.123@gmail.com', 'Mailer');
        $mail->addAddress($email, 'Student');     //Add a recipient
        
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'E-Mail Verification from Exam Ground';
        $mail->Body    = '<div style="text-align: center; position: absolute; top:50%; left:50%; transform: translate(-50%, -50%);">'
        . '<h1 style="font-style:italic; text-align: center; color: rgb(183, 0, 255);">Exam Ground</h1>'
        . "<p>This is a verification mail from Exam Ground. Kindly ignore this, if you haven't initiated this Mail.</p>
        <h4>Click the Button Below to verify your account</h4>"
        .'<span
            style="display:inline-block; font-size: 2.5rem; border: 3px solid green; border-radius: 20px; padding: 8px; background-color: black; margin: 30px;">
            <a href="https://exam-ground.herokuapp.com/verify.php?email='.$email.'&v_code='.$v_code.'" style="color: #fff; text-decoration: none;">Verify</a>
        </span>
        </div>';
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}


$name = $_POST['name'];
$name = ucwords(strtolower($name));
$roll = $_POST['roll'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mob = $_POST['mob'];
$password = $_POST['password'];

$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));

$roll = stripslashes($roll);
$roll = addslashes($roll);

$gender = stripslashes($gender);
$gender = addslashes($gender);
$email = stripslashes($email);
$email = addslashes($email);
$mob = stripslashes($mob);
$mob = addslashes($mob);

$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);

$v_code = bin2hex(random_bytes(16)); 

$query =  "INSERT INTO students VALUES  ('$name', '$roll' , '$gender', '$email' ,'$mob', '$password', '$v_code', '0')";
if (mysqli_query($con, $query) && sendMail($email, $v_code)) {
    echo"
    <script>
        alert('A verification Mail has been sent to $email');
        window.location.href='index.php';
    </script>
    ";
}else{
    echo"
    <script>
        alert('A student with this E-Mail is already Registered.');
        window.location.href='index.php';
    </script>
    ";
}
ob_end_flush();

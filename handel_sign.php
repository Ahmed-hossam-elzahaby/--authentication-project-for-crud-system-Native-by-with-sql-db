<?php
session_start();
require_once "conect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {

        $email = $_POST["email-sign"];
        $password = $_POST["password-sign"];
        $errors = [];
        
        if (empty($email)) {
            $errors[] = "Email is required";
        }
        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $errors[]="Must be email";
        }
        if (empty($password)) {


            $errors[] = "Password is required";
        } elseif (!is_numeric($password)) {
            $errors[] = "password must be number";
        }

        if (empty($errors)) {

            $query_ex="SELECT * FROM `useres` where `email`='$email'";
            $runquery_ex=mysqli_query($con,$query_ex);
if(!mysqli_num_rows($runquery_ex)>0)
{
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO `useres` (`email`,`password`) values ('$email','$password_hash')";
    $runquery = mysqli_query($con, $query);

    if ($runquery) {

        header("location:index.php");
    } else {

        $y= "faild while sign up pleas check email and password";
        $_SESSION["y"]=$y;
        header("location:sign.php");
    }
}else
{
    $ex= "sorry this email allready existe";
$_SESSION["ex"]=$ex;
header("location:sign.php");
}

           
        } else {

            
$_SESSION["errors"]=$errors;
header("location:sign.php");

        }
    }
} else {

    http_response_code(404);
}

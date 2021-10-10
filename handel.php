<?php
session_start();
require_once "conect.php";
if(isset($_POST["submit"]))
{
$email=$_POST["email"];
$password=$_POST["password"];
$query="select * from `useres` where email='$email'  ";
$runquery=mysqli_query($con,$query);
if(mysqli_num_rows($runquery)>0)
{
$user=mysqli_fetch_assoc($runquery);
$_SESSION["user"]=$user["email"];
$iscorrect=password_verify($password,$user["password"]);
if($iscorrect)
{
    header("location:welcome.php");
}else
{
$v="wrong Password";
$_SESSION["v"]=$v;
header("location:index.php");
}
}else
{
$x= "wrong Email";
$_SESSION["x"]=$x;
header("location:index.php");
}
}
?>
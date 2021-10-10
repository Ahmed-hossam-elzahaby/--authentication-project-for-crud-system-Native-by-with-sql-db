<?php
require_once "inclode/conection.php";
session_start();
if(isset($_POST["submit"]))
{

$titel=$_POST["titel"];
$description=$_POST["description"];
$img=$_FILES["img"];

$eroors=[];
if(empty($titel))
{
$eroors[]="titel is required";

}elseif(strlen($titel)<3 || strlen($titel)>255)
{
    $eroors[]="titel between [3-255]";
}
if(empty($description))
{
    $eroors[]="description is required";
 }
elseif(strlen($description)<5 ||  strlen($description)>255){

    $eroors[]="description between [5-255]";
}

$imgname=$img["name"];
$imgtype=$img["type"];
$imgtypename=$img["tmp_name"];
$imgerror=$img["error"];
$imgsize=$img["size"];
$ext=pathinfo($imgname,PATHINFO_EXTENSION);
$imgsizemb=$imgsize/(1024**2);


if($imgerror>1)
{

    $eroors[]="error while uploding or empty  ";
}elseif(!in_array($ext,["png","jpg","gif"]))
{
$eroors[]="must be img";

}elseif($imgsizemb>1)
{
    $eroors[]="muste be 1 mb";
}
if(empty($eroors))
{
    $randstr=uniqid();
    $IMGNEWNAME="$randstr.$ext";
   move_uploaded_file($imgtypename, "uplode/$IMGNEWNAME");
$query="INSERT INTO `user_img` (`titel`,`description`,`img`) VALUES ('$titel','$description','$IMGNEWNAME') ";
$runquery=mysqli_query($con,$query);
// var_dump( $runquery);
if($runquery)
{
    header("location:welcome.php");

}else
{

    echo "error";

}
}else
{

$_SESSION["errors"]=$eroors;
header("location:addpost.php");
}




}





?>
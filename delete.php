<?php
require_once "inclode/conection.php";

$id=$_GET["id"];


// echo "hi $id";

$query_n="select * from `user_img` where id=$id";
$runquery_n=mysqli_query($con,$query_n);
$resulte=mysqli_fetch_assoc($runquery_n);
$resulte["img"];

if(mysqli_num_rows($runquery_n)>0)
{

    $query="DELETE FROM `user_img` WHERE id=$id";
    $runquery=mysqli_query($con,$query);
    unlink("uplode/".$resulte["img"]);
    if($runquery)
    {
    header("location:index.php");
    
    }else{
    
        echo "error ";
    }

}else{


header("location:index.php");

}














?>
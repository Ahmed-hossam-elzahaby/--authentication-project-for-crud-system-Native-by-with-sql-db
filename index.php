
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<form action="handel.php"  method="POST"  >
<h3 class="m-5 px-5 member" >LOGIN</h3>
<hr class="w-75 " >
<div class="container p-4  text-center ">
<div class="text-center">
<h2>Smart Login using PHP</h2>
<?php
session_start();
if(isset($_SESSION["x"]))
{?>


 <p class="text-danger lead"  ><?php  echo $_SESSION["x"];    ?></p>


 <?php }elseif(isset($_SESSION["v"]))
{ unset($_SESSION["user"]); ?>


    
//     <p class="text-danger   lead"><?php    echo $_SESSION["v"];    ?>   </p>

    
 // <?php  }elseif(isset($_SESSION["user"])) 
{
    header("location:welcome.php");
}
unset($_SESSION["x"]);
unset($_SESSION["v"]); 
?> 

<p class="mt-1">Email</p>
<input type="text" name="email"   placeholder="Enter your email" class="form-control    "  >
<p class="mt-1">Password</p>
<input type="password"  name="password" placeholder="Enter your password"  class="form-control "    >
<button name="submit"   class="btn btn- btn-outline-success mt-3 ">login</button>
</div>
</div>
</form>
<div  class="d-flex d-flex justify-content-center   align-items-center" >
<a href="sign.php"><button  class="btn btn- btn-outline-info  ">sign up</button>  </a>
</div>

<hr class="w-75">



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
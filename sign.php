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
<form  action="handel_sign.php"  method="POST" >
<h3 class="m-5 px-5 member" >sign up</h3>
<hr class="w-75 " >
<div class="container p-4  text-center ">
<div class="text-center">
<h2>Smart sign up  using PHP</h2>


<?php
session_start();
if(isset($_SESSION["ex"]))
{?>
 <html>

<p class="text-danger   lead  "  ><?php  echo $_SESSION["ex"];  ?> </p>


 </html>
 <?php }elseif(isset($_SESSION["errors"]))
 {  
foreach($_SESSION["errors"] as $value)
{?> 

 <html>

 <p  class="text-danger   lead " > <?php  echo $value . "<br>"   ?> </p>
 </html>

<?php }
  } elseif(isset($_SESSION["y"]))
 { ?>
     
<html>

<p  class="text-danger lead" > <?php  echo $_SESSION["y"];   ?> </p>

</html>

 <?php } 
unset($_SESSION["ex"]);
unset($_SESSION["errors"]);
?>
<p class="mt-1">Email</p>
<input type="text" name="email-sign"   placeholder="Enter your first email" class="form-control    "  >
<p class="mt-1">Password</p>
<input type="password"  name="password-sign" placeholder="Enter your seconde password"  class="form-control "    >
<button name="submit"   class="btn btn- btn-outline-info mt-3 ">  submit </button>
</div>
</div>
<hr class="w-75">
</form>

<div  class="d-flex d-flex justify-content-center   align-items-center" >
<a href="index.php"><button  class="btn btn- btn-outline-success  ">return to login</button>  </a>
</div>
<hr class="w-75">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>

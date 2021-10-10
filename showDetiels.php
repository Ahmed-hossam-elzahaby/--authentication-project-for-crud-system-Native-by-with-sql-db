<?php
require_once "inclode/conection.php";
if(isset($_GET["id"]))
{

    $id=$_GET["id"];
    $query="SELECT * FROM `user_img` WHERE id=$id";
    $runquery=mysqli_query($con,$query);
    if(mysqli_num_rows($runquery)>0)
    {
        $post=mysqli_fetch_assoc($runquery);

    }else
    {
        header("location:index.php");
    }



}
?>


<?php
require_once "inclode/header.php";
?>



<div class="container  py-5 ">
    <div class="row">
        <div class="col-md-6">
            <img class="w-100  img-fluid " src="uplode/<?php echo $post["img"];  ?>" alt="">
        </div>
        <div class="col-md-6">
            <h1><?php echo $post["titel"];  ?> </h1>
            <p><?php echo $post["description"];  ?></p>

        </div>
    </div>
</div>





<?php
require_once "inclode/foteer.php";
?>
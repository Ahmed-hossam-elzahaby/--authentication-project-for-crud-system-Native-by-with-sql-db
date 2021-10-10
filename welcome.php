<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
?>




<?php

require_once "inclode/conection.php";
$query = "SELECT * FROM `user_img`";
$runquery = mysqli_query($con, $query);
$posts = mysqli_fetch_all($runquery, MYSQLI_ASSOC);
// print_r($posts);

?>



<?php
require_once "inclode/header.php";
?>

<div class="container py-5">
    <a class="mb-3 btn btn-outline-primary  float-end " href="addpost.php">Add post</a>
    <a href="logout.php"><button class="btn btn-danger  float-right ">logout</button></a>

    <div class="row">
        <?php foreach ($posts as $post) {     ?>

            <div class="col-md-4 p-2">
                <img class="w-100 img-fluid" src="uplode/<?php echo $post["img"]  ?>" alt="">
                <h1> <?php echo $post["titel"]  ?> </h1>

                <a class="btn btn-outline-primary" href="showDetiels.php?id=<?php echo $post["id"]  ?>">show detiels</a>
                <a class="btn btn-outline-warning" href="edite.php?id=<?php echo $post["id"] ?>">Edite</a>
                <a class="btn btn-outline-danger" href="delete.php?id=<?php echo $post["id"]  ?>">Delete</a>
            </div>
        <?php } ?>




    </div>
</div>




<?php
require_once "inclode/foteer.php";
?>
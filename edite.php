<?php
require_once "inclode/conection.php";
session_start();
if(isset($_GET["id"]))
{
$id=$_GET["id"];
// echo $id;
$query="SELECT * FROM `user_img` WHERE id=$id";
$runquery=mysqli_query($con,$query);
$post=mysqli_fetch_assoc($runquery);    
// print_r($post);
}
?>

<?php
require_once "inclode/header.php";
?>

<div class="container mt-5">


<?php   if(isset($_SESSION["errors"])){  ?>


<div class="alert  alert-danger ">
<?php foreach($_SESSION["errors"] as $value ){  ?>

    <p><?php echo $value;  ?></p>
    <?php } ?>

</div>

<?php  }
unset($_SESSION["errors"])

?>




<form action="handel-edit.php?id=<?php echo $post["id"]; ?>" method="post"  enctype="multipart/form-data">
<div class="mb-3">
  <label  class="form-label">Title</label>
  <input required type="text" name="titel" value="<?php  echo $post["titel"]; ?>"   class="form-control">
</div>
<div class="mb-3">
  <label class="form-label">Description</label>
  <textarea  name="description"   class="form-control"  rows="3">
<?php
echo $post["description"];
?>


  </textarea>
</div>

<div class="mb-3">
  <label class="form-label"> Image </label>
  <input  name="img"  class="form-control" type="file" >
</div>
<button type="submit"  name="submit"  class="btn btn-warning"  >Edite</button>

</form>
</div>



<?php

require_once "inclode/foteer.php";

?>
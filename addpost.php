<?php
session_start();
require_once "inclode/header.php"
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




<form action="handel_add.php" method="post"   enctype="multipart/form-data"   >
<div class="mb-3">
  <label  class="form-label">Title</label>
  <input  name="titel"  required type="text" class="form-control">
</div>
<div class="mb-3">
  <label class="form-label">Description</label>
  <textarea  name="description" class="form-control"  rows="3"></textarea>
</div>

<div class="mb-3">
  <label class="form-label"> Image </label>
  <input  name="img"  class="form-control" type="file" >
</div>
<button type="submit"  name="submit"  class="btn btn-info"  >Add post</button>

</form>
</div>




<?php
require_once "inclode/foteer.php"
?>
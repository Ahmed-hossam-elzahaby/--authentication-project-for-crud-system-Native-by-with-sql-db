<?php
session_start();
require_once "inclode/conection.php";
if (isset($_POST["submit"]) && isset($_GET["id"])) {
    $id = $_GET["id"];
    $titel = $_POST["titel"];
    $description = $_POST["description"];
    $img = $_FILES["img"];
    // echo $titel,$description;
    $eroors = [];
    if (empty($titel)) {
        $eroors[] = "titel is required";
    } elseif (strlen($titel) < 3 || strlen($titel) > 255) {
        $eroors[] = "titel between [3-255]";
    }
    if (empty($description)) {
        $eroors[] = "description is required";
    } elseif (strlen($description) < 5 ||  strlen($description) > 255) {

        $eroors[] = "description between [5-255]";
    }

    $imgname = $img["name"];
    $imgtype = $img["type"];
    $imgtypename = $img["tmp_name"];
    $imgerror = $img["error"];
    $imgsize = $img["size"];
    $ext = pathinfo($imgname, PATHINFO_EXTENSION);
    $imgsizemb = $imgsize / (1024 ** 2);



    if (empty($eroors)) {
        if (!empty($imgname)) {
            if ($imgerror > 0) {

                $eroors[] = "error while uploding or empty  ";
            } elseif (!in_array($ext, ["png", "jpg", "gif"])) {
                $eroors[] = "must be img";
            } elseif ($imgsizemb > 1) {
                $eroors[] = "muste be 1 mb";
            }

            $randstr = uniqid();
            $IMGNEWNAME = "$randstr.$ext";
            move_uploaded_file($imgtypename, "uplode/$IMGNEWNAME");
            $query = "UPDATE `user_img` SET `titel`='$titel', `description`='$description',`img`='$IMGNEWNAME' Where id=$id ";
            $runquery = mysqli_query($con, $query);
            // var_dump( $runquery);
            header("location:welcome.php");
        } else {
            $query = "UPDATE `user_img` SET `titel`='$titel', `description`='$description' Where id=$id ";
            $runquery = mysqli_query($con, $query);
            header("location:welcome.php");
        }
      
    } else {

        $_SESSION["errors"] = $eroors;
        header("location:edite.php?id=$id");
    }
}

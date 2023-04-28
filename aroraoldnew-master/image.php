<?php
require_once('auth/lib/connections/db.php');
include_once "include/head.php";

if (isset($_POST['sectorno'])) {
  $sql = "delete FROM images WHERE sectorno= '" . $_POST['sectorno'] . "' AND  image_id=" . $_POST['image_id'];
} else {
  $sql    = "SELECT * FROM images WHERE sectorno= '" . $_GET['sectorno'] . "' AND  image_id=" . $_GET['image_id'];
}


$result = mysqli_query($db, $sql);
if (!is_null($result) && mysqli_num_rows($result) > 0) {
  $row = @mysqli_fetch_array($result);
  //$image_type = $row["image_type"];
  $image = $row["image"];
} else {
  echo "record deleted";
  echo "<script>history.go(-2);</script>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="reg" name="delete" class="my-5 mx-5 " method="post">
  <input type="hidden" name="deletethis">
  <input type="hidden" name="sectorno" value="<?php echo $_GET['sectorno']; ?>">
  <input type="hidden" name="image_id" value="<?php echo $_GET['image_id']; ?>">
  <input type="submit" onclick="return confirm('Are you sure you want to delete this ?')" value="Delete the map image" class="btn btn-outline-danger text-center">
</form>
<hr>
<img src="<?php echo $image ?>" style="max-width:none" />
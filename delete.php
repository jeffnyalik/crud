<?php include('./inc/header.php'); ?>
<?php include('./config/config.php'); ?>
<?php include('./lib/Database.php'); ?>
<?php  include('./helpers/error.php'); ?>
<?php $db = new Database; ?>

<?php
$id = $_GET['id'];
$delete = "DELETE FROM tbl_users WHERE id=$id";
$delete_row = $db->Delete($delete);
if($delete_row)
{
  echo "data deleted";
  return false;
}
?>
<p class="text-muted"><a href="index.php">Go back...</a></p>

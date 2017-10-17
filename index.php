<?php include_once('./inc/header.php'); ?>
<?php include_once('./config/config.php'); ?>
<?php include_once('./lib/Database.php'); ?>
<?php include_once('./helpers/error.php'); ?>
<?php $db = new Database; ?>

<?php
$query = "SELECT * FROM tbl_users";
$data = $db->select($query);
?>

<?php
  if(isset($_GET['msg']))
  {
    $msg = $_GET['msg'];
    echo Message::$success;

  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <div class="container">
    <div class="row">
      <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th width="">Name</th>
        <th width="">Email</th>
        <th width="">Occupation</th>
        <th width="">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
          if($data)
          {
            while($row = $data->fetch_assoc())
            {
       ?>
      <tr>
        <th scope="row"><?php echo $i++; ?></th>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['occupation']; ?></td>
        <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit User</a</td>
        <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete User</a</td>
      </tr>
    <?php } } else { echo "there is an error"; }?>
    </tbody>
  </table>
    </div>
  </div>
    <div class="container">
      <div class="row">
        <a href="create.php" class="btn btn-primary">Add users</a>
      </div>
    </div>
  </body>
</html>

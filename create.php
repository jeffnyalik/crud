<?php include('./inc/header.php'); ?>
<?php include('./config/config.php'); ?>
<?php include('./lib/Database.php'); ?>
<?php  include('./helpers/error.php'); ?>
<?php $db = new Database; ?>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $name =  mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $occupation = mysqli_real_escape_string($db->link, $_POST['occupation']);

    // check if the fields are Empty
    if($name == '' || $email == '' || $occupation == '')
    {
      echo Message::$errors;
    }else
    {
      $query = "INSERT INTO tbl_users(name, email, occupation) VALUES('$name', '$email', '$occupation')";
      $insert_id = $db->Insert($query);
      if($insert_id)
      {
        echo Message::$success;
      }

    }
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .form-control{max-width:280px;}
      body{padding:50px;}
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form class="" action="create.php" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="name">Email</label>
            <input type="text" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="name">Occupation</label>
            <input type="text" name="occupation" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary">
            <input type="reset" name="reset" class="btn btn-primary">
          </div>
          <p class="text-muted"><a href="index.php">Go back...</a></p>
        </form>
      </div>
    </div>
  </body>
</html>

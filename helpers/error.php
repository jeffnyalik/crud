<?php
class Message{
  public static $errors = '<div class="alert alert-danger">please fill in all the fields</div>';
  public static $success = '<div class="alert alert-success">data inserted successfully</div>';
  public function errorMessage($errors){
    echo  self::$errors;
    return false;
  }

  public function successMessage($success){
    return $self::$success;
    return true;
  }
}


$message = new Message;

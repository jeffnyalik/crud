<?php
class Database{
  public $host = DB_HOST;
  public $user = DB_USER;
  public $pass = DB_PASS;
  public $dbname = DB_NAME;

  public $link;
  public $error;

public function __construct(){
  $this->connectDB();
 }

 private function connectDB(){
   $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
   if($this->link){
     $this->error."connection failed".$this->link->connect_error;
     return false;
   }
 }

 // select data
 public function select($query){
   $result = $this->link->query($query) or die($this->link->error.__LINE__);
   if($result->num_rows > 0){
     return $result;
   }else{
     return false;
   }
 }

 // insert data
 public function Insert($query){
   $insert_id = $this->link->query($query) or die($this->link->error.__LINE__);
   if($insert_id){
     header('Location: index.php?msg=$msg');
     exit();
   }else{
     die("Error: "). $this->link->error;
   }
 }

// update data
 public function Update($query){
   $update_ids = $this->link->query($query) or die($this->link->error.__LINE__);
   if($update_ids){
     echo  "<div class='alert alert-success'>data updated successfully". "</div>";
     return false;
   }else{
     die("Error"). $this->link->error;
   }
 }

 // delete data
 public function Delete($query){
   $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
   if($delete_row){
     echo "<div class='alert alert-success'>data deleted successfully". "</div>";
     return false;
   }else{
     die("Error: ").$this->link->error;
   }
 }
}

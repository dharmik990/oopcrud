<?php

class db{

 private $con;
 private $ser="localhost";
 private $host="root";
 private $pass="";
 private $table="dharmik_sutariya_db";
 private $result=array();
 
  function  __construct(){
     $this->con=mysqli_connect($this->ser,$this->host,$this->pass,$this->table);

     if($this->con->connect_error){
        echo "conection faild";
    }else{
        echo "database connected";
    }
        
         
  }
  function insert($post){
      $name=$post['name'];
      $email=$post['email'];
      $password=$post['password'];
      $sql="INSERT INTO admin(`name`,`email`,`password`)VALUES('$name','$email','$password')";
      $ins=mysqli_query($this->con,$sql);
      if(isset($ins)){
        header("refresh:2;url=index.php?msg=ins");
    

      }else{
        echo "error".$sql.$this->con->error;
      }
  }

  function select(){
    
    $sql="SELECT * FROM admin";
    $select=mysqli_query($this->con,$sql);
    if($select->num_rows>0){
        while($data=mysqli_fetch_assoc($select)){
             $row[]=$data;
            }
            return $row;
    }

  }

  public function display($uid){
    $sql="SELECT * FROM admin WHERE `id`='$uid'";
    $ex=mysqli_query($this->con,$sql);
    if($ex->num_rows==1){
       $row=$ex->fetch_assoc();
       return $row;
    }
  }
  public function update($post){
    $id=$_GET['update_id'];
    $name=$post['name'];
    $email=$post['email'];
    $sql="UPDATE admin SET `name`='$name' WHERE `id`='$id'";
    $exc=mysqli_query($this->con,$sql);
    if($exc){
      header("location:index.php?ms=up");
    }
  }
  public function deletei($did){
    $sql= "DELETE FROM admin WHERE `id`='$did'";
    $exe=mysqli_query($this->con,$sql);
    if($exe){
      header("location:index.php?msg-");
    }else{
      echo "error".$sql.$this->con->error;
    }


  }

}







?>
<?php 

$server="localhost" ; 
$username="root";
$password="";
$dbname="medical_srv";
$conn=mysqli_connect($server,$username,$password,$dbname); 
if(!$conn){
    die( 'error in connection' .mysqli_connect_error()) ; //stop everything in project
}

function db_insert($sql){
    global $conn ; 
    $result=mysqli_query($conn,$sql); 
    if($result){
        return "added succes" ; 
    }
    return 'there is an error' ;
}
function getRow($field,$value,$table){
    global $conn ;
    $sql = "SELECT * FROM `$table` WHERE `$field`='$value' ";
    $result = mysqli_query($conn,$sql);
      if($result){
        $rows = [];
        if(mysqli_num_rows($result) > 0)
        {
            $rows[] = mysqli_fetch_assoc($result);
            return $rows[0];
        }    
      }
      return false ;
}
function getRows($table){
  global $conn ; 
  $sql= "SELECT * FROM `$table` ";
  $result = mysqli_query($conn,$sql);
  if($result){
      $rows=[];
       if(mysqli_num_rows($result) > 0 ){
           
        while($row = mysqli_fetch_assoc($result)){
            $rows[]=$row ; 
        };
        }
  }
  return $rows ;
}
function db_update($sql){
    global $conn ; 
    $result=mysqli_query($conn,$sql); 
    if($result){
        return "Updated succes" ; 
    }
    return 'there is an error' ;
} 
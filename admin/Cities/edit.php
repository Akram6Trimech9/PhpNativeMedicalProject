<?php 
require '../../config.php' ; 
require '../inc/header.php';
require_once BL.'/functions/db.php' ;
require_once BL.'/functions/validate.php' ;

if(isset($_GET['id'])&& is_numeric($_GET['id'])){
$row=getRow('city_id' , $_GET['id'] , 'cities') ; 
if($row){
  $city_id=$row['city_id'];
  if(isset($_POST['submit'])){
    $name=$_POST['city_name'];
    $city_id=$_POST['city_id'];
    if(checkEmpty($name) and Checklength($name)){
      $sql = "UPDATE cities SET `city_name`='$name' WHERE `city_id`='$city_id' ";
      $success_message=db_update($sql);
      header("refresh:2;url=".BURLA."cities");
        
    }else{
        $error_message='please Type correct Data';
    }
  }
     
 }
}else{
    // header("location:".BURLA);
}
?>
 


 
    

<div style="width: 300px;  margin-top: 250px; margin-left: 600px;">
<?php require_once BL.'/functions/messages.php' ;
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" >
  <div class="form-group">
    <label for="cityname">City name :</label>
    <input  name="city_name" type="text" class="form-control"  aria-describedby="emailHelp" >
    <input type="hidden" value="<?php  echo $city_id ;?>" name="city_id">   
</div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php 
require '../inc/footer.php'; ?>
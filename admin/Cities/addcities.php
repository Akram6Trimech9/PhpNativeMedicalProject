<?php 
require '../../config.php' ; 
require '../inc/header.php';
require_once BL.'/functions/db.php' ;
require_once BL.'/functions/validate.php' ;

 if(isset($_POST['submit'])){
     $cityname=$_POST['city_name'];
       if(checkEmpty($cityname)){
        $sql = "INSERT INTO cities (`city_name`) 
        VALUES ('$cityname') ";
        $success_message = db_insert($sql);
       }else{
        $error_message="fill the field";
       }
 }
    
?>
<div style="width: 300px;  margin-top: 250px; margin-left: 600px;">
<?php require_once BL.'/functions/messages.php' ;
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" >
  <div class="form-group">
    <label for="cityname">City name :</label>
    <input  name="city_name" type="text" class="form-control" id="cityname" aria-describedby="emailHelp" >
   </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php 
require '../inc/footer.php'; ?>
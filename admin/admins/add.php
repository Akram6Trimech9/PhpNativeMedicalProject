<?php  require_once '../../config.php'; 
require_once BLA.'/inc/header.php';
require_once BL.'/functions/validate.php';
require_once BL.'/functions/db.php' ;
?>
  <?php
   if(isset($_POST['submit'])){
       $name=$_POST['name'];
       $email=$_POST['email'];
       $password =$_POST['password'];
if(checkEmpty($name) && (checkEmpty($email) && (checkEmpty($password)))){
    if(ValidEmail($email)){
        $password = password_hash($password,PASSWORD_DEFAULT);
                            $sql = "INSERT INTO admins (`admin_name`,`admin_email`,`admin_password`) 
                            VALUES ('$name','$email','$password') ";
                                                        $success_message = db_insert($sql);



     }else{
        $error_message="Please Correct Email";      
    }
}else{
     $error_message="fill all fields ";
}
require BL.'/functions/messages.php';

  }
   ?>
<div class="addadmincard">
    <div class="title">
        ADD A NEW ADMIN
    </div>   
    <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post" >
    <div class="forms">
     <div class="input-group">
         <div class="input-group-prepend">
            <span class="input-group-text" id="">name </span>
          </div>
             <input type="text" name="name" class="form-control">
        </div>
        <div class="input-group">
         <div class="input-group-prepend">
            <span class="input-group-text" id="">Email </span>
          </div>
             <input name="email"  type="text" class="form-control">
        </div>
        <div class="input-group">
         <div class="input-group-prepend">
            <span class="input-group-text" id="">password</span>
          </div>
             <input  name="password" type="text" class="form-control">
        </div>
         <button name="submit" type="submit" class="btn btn-success"> Save</button> 
    </div>
    </form>
  
</div>


<?php require_once BLA.'/inc/footer.php'  ?>
 
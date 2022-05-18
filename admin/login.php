<?php  
  if(isset($_SESSION['admin_name'])){
      header("location:".BURLA.'index.php');
  } 
  ?>
<?php  require_once '../config.php'; 
 require_once BL.'/functions/validate.php';
require_once BL.'/functions/db.php' ;
?>
<div >
    <?php 
      if(isset($_POST['submit'])){
          $email=$_POST['email'];
          $password=$_POST['password'];
          if(checkEmpty($email)&& checkEmpty($password)){
             if( ValidEmail($email) ){
                $check = getRow('admin_email',$email,'admins');
                //var_dump($check);
                $check_password=password_verify($password,$check["admin_password"]);
                   if($check_password)
                   {
                       $_SESSION['admin_name']=$check['admin_name'];
                       $_SESSION['admin_email']=$check['admin_email'];
                       $_SESSION['admin_id']=$check['admin_id'];
                       header("location:".BURLA.'index.php');


                    } else {
                    $error_message="data not  correct ";
                }
              }else{
                $error_message="type correct email";
             }
          }else{
              $error_message="fill all fields";
          }
      }
    ?>
 <div style="border-radius:30px  ;display: flex; flex-direction: column;align-items: center; justify-content: center; margin-top: 200px; box-shadow: 5px 5px 5px  5px grey; width: 500px; margin-left: 480px;">
      <div  style=" padding-top:20px ;text-align: center;font-size: x-large;   font-family: Georgia, 'Times New Roman', Times, serif; width: 100%; height: 60px;">
           Login page 
      </div>
       <div>
    <?php  require BL.'/functions/messages.php'?>
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
           <label style="font-style:40px ; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;" for="email">Email : </label> <br>
           <input placeholder="Exemple@gmail.com"  style="border-radius: 10px; width: 300px; height: 30px; margin-top: 10px;" id="email" name="email" type="text" /> <br>
            <label style="font-style:40px ; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;" for="password"> password</label> <br>
            <input  style="border-radius: 10px; width: 300px; height: 30px; margin-top: 10px;"  id="password" type="password" name="password"/><br>
                <button  class="btn btn-danger" type="submit" name="submit" style="margin-top: 30px; margin-left: 300px; background-color:green ; height: 30px; color: white; border-radius: 5px;"> Submit</button>
        </form>
     </div> 
    </div>        

</div>
<?php
require_once("../auto_loader.php");

$DB = new Database();

if(isset($_POST["login"]))
{
   $email = htmlspecialchars(strip_tags($_POST['email']));
   $password = htmlspecialchars(strip_tags($_POST['password']));

   $login_obj = new Login($DB,$email,$password);

   $result = $login_obj->login();
   
   if($result)
   {
       $_SESSION['id'] = $result['id'];
       if($result['status'] == 1)
       {
          header("location:../views/admin/index.php");
       }
       else
       {
        header("location:../views/student/index.php");
       }
   }
   else
   {
     header("location:../views/login.php");
   }
}
<?php
require_once("../auto_loader.php");

$DB = new Database();

if(isset($_POST["add-student"]) || isset($_POST["signup"]))
{
   $user_name = htmlspecialchars(strip_tags($_POST['first-name']));
   $last_name = htmlspecialchars(strip_tags($_POST['last-name']));
   $email = htmlspecialchars(strip_tags($_POST['email']));
   $password = htmlspecialchars(strip_tags($_POST['password']));
   $password_r = htmlspecialchars(strip_tags($_POST['password-r']));

   $signup_obj = new Signup($DB,$user_name,$last_name,$email,$password,$password_r);

   $result = $signup_obj->sign_up();
   
   if($result)
   {
       if(isset($_POST["signup"]))
       {
          header("location:../views/login.php");
          exit();
       }
       elseif(isset($_POST["add-student"]))
       {
          $_SESSION['db-succ-message'] = "User registered successfully";
          header("location:../views/admin/manage_student.php");  
          exit();      
       }
   }
   if(!$result && isset($_POST["signup"]))
   {
     header("location:../views/signup.php");
   }
   if(!$result && isset($_POST["add-student"]))
   {
    header("location:../views/admin/register_student.php");
   }
}
<?php
require_once("../auto_loader.php");

$Db = new Database();

if(isset($_GET['email']))
{
    $email = htmlspecialchars(strip_tags($_GET['email']));

    $user_obj = new User($Db);
    $verify = $user_obj->verify($email);

    if($verify)
    {
        $_SESSION['db_message'] = "Your account has been successfully verified";
    }
    else
    {
        $_SESSION['db_message'] = "Sorry, couldn't verify your account. Please try again";
    }

    header("location:../views/student/index.php");
    exit();
}
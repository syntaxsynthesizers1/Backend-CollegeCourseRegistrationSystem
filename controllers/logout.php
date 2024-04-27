<?php
 require_once("../auto_loader.php");

 unset($_SESSION['user']);
 session_destroy();

 header("location:../views/login.php");

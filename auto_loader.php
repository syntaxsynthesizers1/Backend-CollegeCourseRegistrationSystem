<?php
 spl_autoload_register('autoloader');

 function autoloader($classname)
 {
     $path = "models/";
     $extension = ".php";
     $fullpath = $path.$classname.$extension;

     include_once($fullpath);
 }
 
session_start();
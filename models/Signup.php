<?php

 class Signup
 {
     private string $first_name;
     private string $last_name;
     private string $email;
     private string $password;
     private string $password_r;
     public  $dbc_obj;

     public function __construct(Database $Db, string $first_name, string $last_name, string $email, string $password, string $password_r)
     {
        $this->dbc_obj = $Db;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->password_r = $password_r;
     }

     private function empty_input():bool
     {
        $result;
        if(empty($this->first_name) || empty($this->last_name) || empty($this->email) || empty($this->password) || empty($this->password_r))
        {
           $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
     }

     
     private function invalid_email():bool
     {
         $result;
         if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
         {
             $result = false;
         }
         else
         {
             $result = true;
         }
         return $result;
     }

    private function password_match():bool
    {
        $result;
        if($this->password !== $this->password_r)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

     private function already_exists():bool
     {
         $sql = "SELECT * FROM user WHERE email= :email";
         $stmt = $this->dbc_obj->con->prepare($sql);
         $stmt->execute(['email'=>$this->email]);
         $count = $stmt->rowCount();
         
         if($count > 0)
         {
             return false;
         }
         else
         {
             return true;
         }

     }

     public function sign_up()
     {

         if($this->empty_input() === false)
         {
             $_SESSION['sl_err_message'] ="Empty input. Please try again";
             return false;
             exit();
         }

         if($this->invalid_email() === false)
         {
             $_SESSION['sl_err_message'] ="Email is invalid";
             return false;
             exit();
         }

         if($this->password_match() === false)
         {
             $_SESSION['sl_err_message'] ="Password dose not match";
             return false;
             exit();
         }

         if($this->already_exists() === false)
         {
             $_SESSION['sl_err_message'] ="User with this email already exists. Please try again";
             return false;
             exit();
         }

         $user_obj = new User($this->dbc_obj, $this->first_name, $this->last_name, $this->email,md5($this->password));

         return $user_obj->add();   
     }
 }
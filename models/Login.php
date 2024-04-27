<?php

 class Login
 {
     private string $email;
     private string $password;
     public  $dbc_obj;

     public function __construct(Database $Db, string $email, string $password)
     {
        $this->email = $email;
        $this->password = $password;
        $this->dbc_obj = $Db;
     }

     public function login():array|bool
     {
         $sql = "SELECT * FROM user WHERE email = :email";
         $stmt = $this->dbc_obj->con->prepare($sql);
         $stmt->execute(['email'=>$this->email]);
         $row_count = $stmt->rowCount();


         if($row_count == 1)
         {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $password = $row['password'];
            $this->password = md5($this->password);

            if($this->password == $password)
            {
                return $row;
                exit();
            }
            else
            {
                $_SESSION['sl_err_message'] = "Incorrect password. Please try again";
                return false;
                exit();         
            }
         }
         else
         {
             $_SESSION['sl_err_message'] = "Incorrect email. Please try again";
             return false;
             exit();
         }
     }
 }
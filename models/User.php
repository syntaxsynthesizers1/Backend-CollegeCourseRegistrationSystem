<?php

 class User
 {
    private string|null $first_name;
    private string|null $last_name;
    private string|null $email;
    private string|null $password;
    private string|null $gender;
    private string|null $phone;
    private string|null $image;

    public  $dbc_obj;

    public function __construct(Database $Db, string $first_name=null, string $last_name=null, string $email=null, string $password=null, string $gender=null, string $phone=null, string $image=null)
    {
        $this->dbc_obj = $Db;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->image = $image;
    }

    public function add()
    {
         
        $sql = "INSERT INTO user SET first_name =:firstname, last_name=:lastname, email=:email, password = :pwd";
        $stmt = $this->dbc_obj->con->prepare($sql);

         $result = $stmt->execute(['firstname'=>$this->first_name,'lastname'=>$this->last_name,'email'=>$this->email,'pwd'=>$this->password]);

        if($result)
        {
           return true;
           exit();
        }
        else
        {
           $_SESSION['sl_err_message'] = "Unable to register user. Please try again";
           return false;
           exit();
        }
    }

    public function add_admin()
    {
         
        $sql = "INSERT INTO user SET first_name =:firstname, last_name=:lastname, email=:email, password =:pwd, status=:sts" ;
        $stmt = $this->dbc_obj->con->prepare($sql);

         $result = $stmt->execute(['firstname'=>$this->first_name,'lastname'=>$this->last_name,'email'=>$this->email,'pwd'=>md5($this->password),'sts'=>1]);

        if($result)
        {
           return true;
           exit();
        }
        else
        {
           return false;
           exit();
        }
    }
    public function user($id):array
    {
        $sql = "SELECT * FROM user wHERE id=:id";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $row_count = $stmt->rowCount();
        if($row_count == 1)
        {
            return $result;
        }
        else
        {
            return [];
        }
    }



    public function students():array
    {
        $sql = "SELECT * FROM user WHERE status=0";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $row_count = $stmt->rowCount();
        if($row_count > 0)
        {
            return $result;
        }
        else
        {
            return [];
        }
    }
    

    public function student($id):array
    {
        $sql = "SELECT * FROM user WHERE status=0 && id=:id";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $row_count = $stmt->rowCount();
        if($row_count == 1)
        {
            return $result;
        }
        else
        {
            return [];
        }
    }
    

    public function admins():array
    {
        $sql = "SELECT * FROM user wHERE status=1";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $row_count = $stmt->rowCount();
        if($row_count > 0)
        {
            return $result;
        }
        else
        {
            return [];
        }
    }

    public function update_student($id,$first_name,$last_name,$email,$gender,$phone,$image):bool
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->image = $image;

        $sql = "UPDATE user SET first_name =:firstname, last_name=:lastname, email=:email, gender =:gender, phone=:phone, img=:img WHERE id=:id";

        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['firstname'=>$this->first_name,'lastname'=>$this->last_name,'email'=>$this->email,'gender'=>$this->gender,'phone'=>$this->phone,'img'=>$this->image,'id'=>$id]);

        if($result)
        {
          return true;
        }
        else
        {
            return false;
        }

    }

    public function verify($email)
    {
        $sql = "UPDATE user SET verified =:vry WHERE email=:email";

        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['vry'=>1,'email'=>$email]);

        if($result)
        {
          return true;
        }
        else
        {
            return false;
        }

    }

    public function update_password($id,$current,$new,$confirm):bool
    {
       if($new == $confirm)
       {
        $current = md5($current);
        $sql = " SELECT * FROM user  WHERE password = :current && id = :id";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $stmt->execute(['id'=>$id,'current'=>$current]);
 
        $row_count = $stmt->rowCount();
 
        if($row_count == 1)
        {
         $sql = "UPDATE user SET password = :new WHERE id = :id";
         $stmt = $this->dbc_obj->con->prepare($sql);
         $result = $stmt->execute(['id'=>$id,'new'=>md5($new)]);
         
         if($result)
         {
             return true;
         }
         else
         {
            $_SESSION['db_message'] = "Error: Unable to update password";
            return false;
            exit();
         }      
        }
        else
        {
            $_SESSION['db_message'] = "Current password incorrent. Please try again";
            return false;
            exit();
        }
       }
       else
       {
        $_SESSION['db_message'] = "Password does not match. Please try again";
        return false;
        exit(); 
       }
       
    }

    public function delete($id):bool
    {
        $sql = "DELETE FROM user WHERE id=:id";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['id'=>$id]);

        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }


}
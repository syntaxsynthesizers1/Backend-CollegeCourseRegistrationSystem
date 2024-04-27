<?php

 class Department
 {
    private int|null $faculty;
    private string|null $name;

    public  $dbc_obj;

    public function __construct(Database $Db, int $faculty = null, string $name = null)
    {
       $this->dbc_obj = $Db;
       $this->faculty = $faculty;
       $this->name = $name;
    }

    public function add():bool
    {
        $sql = "INSERT INTO department SET name = :name, faculty_id =:faculty";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['faculty'=>$this->faculty,'name'=>$this->name]);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_all():array
    {
        $sql = "SELECT *,  f.name AS faculty FROM faculty f join department d   ON f.id = d.faculty_id ORDER BY d.created_at DESC";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result)
        {
            return $result;
        }
        else
        {
            return [];
        }
    }

    public function get($id):array
    {
        $sql = "SELECT *,  f.name AS faculty FROM faculty f join department d   ON f.id = d.faculty_id WHERE d.id=:id";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result)
        {
            return $result;
        }
        else
        {
            return [];
        }
    }

    public function update_department($id,$faculty,$name,):bool
    {
        $this->faculty = $faculty;
        $this->name = $name;
        
        $sql = "UPDATE department SET faculty_id=:faculty, name=:name  WHERE id=:id";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['faculty'=>$this->faculty,'name'=>$this->name,'id'=>$id]);
        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }


    public function delete($id):bool
    {
        $sql = "DELETE FROM department WHERE id=:id";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['id'=>$id]);

        if($result)
        {
            $sql = "DELETE FROM course WHERE id=:id";
            $stmt = $this->dbc_obj->con->prepare($sql);
            $delete = $stmt->execute(['id'=>$id]);
    
            if($delete)
            {
                return true;
                exit();
            }
            else
            {
                $_SESSION['db-err-message'] = "Unable to delete courses releted to target department. Please try again";
                return false;
                exit();
            }
        }
        else
        {
            $_SESSION['db-err-message'] = "Unable to delete department. Please try again";
            return false;
            exit();
        }
    }


 }
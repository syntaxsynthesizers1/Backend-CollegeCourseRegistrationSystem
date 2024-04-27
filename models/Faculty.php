<?php

 class Faculty
 {
    private string|null $name;
    public  $dbc_obj;

    public function __construct(Database $Db, string $name = null)
    {
       $this->dbc_obj = $Db;
       $this->name = $name;
    }

    
    public function add():bool
    {
        $sql = "INSERT INTO faculty SET name = :name";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['name'=>$this->name]);

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
        $sql = "SELECT * FROM faculty";
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
        $sql = "SELECT * FROM faculty WHERE id=:id";
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


    public function update_faculty($id,$name):bool
    {
        $this->name = $name;

        $sql = "UPDATE faculty SET name =:namee WHERE id=:id";

        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['namee'=>$this->name,'id'=>$id]);

        if($result)
        {
          return true;
        }
        else
        {
            return false;
        }

    }
 }
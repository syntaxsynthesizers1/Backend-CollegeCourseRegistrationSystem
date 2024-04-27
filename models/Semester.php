<?php

 class Semester
 {
    private string|null $semester;
    public  $dbc_obj;

    public function __construct(Database $Db, string $semester = null)
    {
       $this->dbc_obj = $Db;
       $this->semester = $semester;
    }

    public function add():bool
    {
        $sql = "INSERT INTO semester SET semester = :semester";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['semester'=>$this->semester]);

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
        $sql = "SELECT * FROM semester";
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

    public function delete($id):bool
    {
        $sql = "DELETE FROM semester WHERE id=:id";
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
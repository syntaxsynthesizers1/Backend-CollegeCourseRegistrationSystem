<?php

 class Session
 {
    private string|null $session;
    public  $dbc_obj;

    public function __construct(Database $Db, string $session = null)
    {
       $this->dbc_obj = $Db;
       $this->session = $session;
    }

    public function add():bool
    {
        $sql = "INSERT INTO session SET session = :session";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['session'=>$this->session]);

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
        $sql = "SELECT * FROM session ORDER BY created_at DESC";
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
        $sql = "DELETE FROM session WHERE id=:id";
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
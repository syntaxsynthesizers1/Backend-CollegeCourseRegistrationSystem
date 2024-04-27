<?php

 class Course
 {
    private int|null $department;
    private string|null $course_code;
    private string|null $course_name;

    public  $dbc_obj;

    public function __construct(Database $Db, int $department=null, string $course_code = null,string $course_name = null)
    {
       $this->dbc_obj = $Db;
       $this->department = $department;
       $this->course_code = $course_code;
       $this->course_name = $course_name;
    }

    public function add():bool
    {
        $sql = "INSERT INTO course SET department=:department, course_code = :coursecode,course_name =:coursename";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['department'=>$this->department,'coursecode'=>$this->course_code,'coursename'=>$this->course_name]);

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
        $sql = "SELECT *, d.name as department_name, c.id as course_id FROM course c JOIN department d on c.department = d.id ORDER BY c.created_at DESC";
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
        $sql = "SELECT * FROM course WHERE id=:id";
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

    
    public function update_course($id,$department,$course_code,$course_name):bool
    {
        $this->department = $department;
        $this->course_code = $course_code;
        $this->course_name = $course_name;

        $sql = "UPDATE course SET department=:department, course_code = :coursecode, course_name =:coursename WHERE id=:id";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['department'=>$this->department,'coursecode'=>$this->course_code,'coursename'=>$this->course_name,'id'=>$id]);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    public function delete($id):bool
    {
        $sql = "DELETE FROM course WHERE id=:id";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['id'=>$id]);

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
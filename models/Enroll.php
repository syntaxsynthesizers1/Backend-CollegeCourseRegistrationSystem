<?php

 class Enroll
 {
    private int $student_id;
    private string $name;
    private string $session;
    private string $level;
    private string $semester;
    private string $course;

    public  $dbc_obj;

    public function __construct(Database $Db)
    {
       $this->dbc_obj = $Db;
    }

    
    public function add($student_id,$name,$session,$level,$semester,$course):bool
    {
        $this->student_id = $student_id;
        $this->name = $name;
        $this->session = $session;
        $this->level = $level;
        $this->semester = $semester;
        $this->course = $course;

        $sql = "INSERT INTO enrolled SET student_id=:student_id, student_name = :s_name, session =:sessionn, level=:level, semester=:semester,course=:course";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['student_id'=>$this->student_id,'s_name'=>$this->name,
        'sessionn'=>$this->session,
        'level'=>$this->level,
        'semester'=>$this->semester,
        'course'=>$this->course]);

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
        $sql = "SELECT * FROM enrolled e join user u ON u.id=e.student_id ORDER BY e.created_at DESC";
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
        $sql = "SELECT *, e.id as enrolled_id FROM enrolled e join course c ON e.course=c.id WHERE student_id=:id";
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


    public function update($id,$student_id,$name,$session,$level,$semester,$course):bool
    {
        $this->student_id = $student_id;
        $this->name = $name;
        $this->session = $session;
        $this->level = $level;
        $this->semester = $semester;
        $this->course = $course;

        $sql = "UPDATE enrolled SET student_id=:student_id, student_name = :s_name, session =:sessionn, level=:level, semester=:semester,course=:course WHERE id=:id";
        $stmt = $this->dbc_obj->con->prepare($sql);
        $result = $stmt->execute(['id'=>$id,
        'student_id'=>$this->student_id,
        's_name'=>$this->name,
        'sessionn'=>$this->session,
        'level'=>$this->level,
        'semester'=>$this->semester,
        'course'=>$this->course]);

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
        $sql = "DELETE FROM enrolled WHERE student_id=:id";
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
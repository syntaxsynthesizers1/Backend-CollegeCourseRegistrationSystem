<link rel="stylesheet" href="../../assets/css/all.min.css">
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css.map">
<link rel="stylesheet" href="../../assets/css/style.css">

<?php

include("../../auto_loader.php");
if(isset($_SESSION['id']))
{
    $Db = new Database();

    $user_obj = new User($Db);

    $_SESSION['user'] = $user_obj->user($_SESSION['id']);
    $user = $_SESSION['user'];

    // Student data from database
    $students = $user_obj->students();

    // Single student data
    if(isset($_GET['student-id']))
    {
        $id = htmlspecialchars(strip_tags($_GET['student-id']));
        $student = $user_obj->student($id);
    }
    

    // Admin data from database
    $admins = $user_obj->admins();


    // Session data from database
    $session_obj = new Session($Db);
    $sessions = $session_obj->get_all();

    // Semester data from database
    $semester_obj = new Semester($Db);
    $semesters = $semester_obj->get_all();

        
    // Faculty data from database
    $faculty_obj = new Faculty($Db);

    // All faculty data from database
    $faculties = $faculty_obj->get_all();

    // Single faculty data from database
    if(isset($_GET['faculty-id']))
    {
        $id = htmlspecialchars(strip_tags($_GET['faculty-id']));
        $faculty = $faculty_obj->get($id);
    }
    
        
    // Department data from database
    $department_obj = new Department($Db);

    // All department data
    $departments = $department_obj->get_all();

    // Single department data
    if(isset($_GET['department-id']))
    {
        $id = htmlspecialchars(strip_tags($_GET['department-id']));
        $department = $department_obj->get($id);
    }

    // Course data from database
    $course_obj = new Course($Db);

    // All course data
    $courses = $course_obj->get_all();

    // Single course data
    if(isset($_GET['course-id']))
    {
        $id = htmlspecialchars(strip_tags($_GET['course-id']));
        $course = $course_obj->get($id);
    }

    
    // Enroll data from database
    $enroll_obj = new Enroll($Db);

    // All enroll data
    $enrolls = $enroll_obj->get_all();

    // Single enroll data
    $enrolled = $enroll_obj->get($user['id']);

    if(isset($_GET['enrolled-id']))
    {
        $id = htmlspecialchars(strip_tags($_GET['enrolled-id']));
        $enrolled = $enroll_obj->get($id);
    }


}
else
{
    header("location:../login.php");
}
?>
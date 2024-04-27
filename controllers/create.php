<?php
require_once("../auto_loader.php");

$DB = new Database();

if(isset($_POST['add-session']))
{
   $session = htmlspecialchars(strip_tags($_POST['session']));
   
   $session_obj = new session($DB,$session);

   $result = $session_obj->add();

   if($result)
   {
      $_SESSION['db-succ-message'] = "Session created successfully";
   }
   else
   {
      $_SESSION['db-err-message'] = "Unable to create session. Please try again";
   }
   header("location:../views/admin/session.php");
}

if(isset($_POST['add-semester']))
{
   $semester = htmlspecialchars(strip_tags($_POST['semester']));
   
   $semester_obj = new Semester($DB,$semester);

   $result = $semester_obj->add();

   if($result)
   {
      $_SESSION['db-succ-message'] = "Semester created successfully";
   }
   else
   {
      $_SESSION['db-err-message'] = "Unable to create semester. Please try again";
   }
   header("location:../views/admin/semester.php");
}


if(isset($_POST['add-faculty']))
{
   $name = htmlspecialchars(strip_tags($_POST['name']));
   
   $faculty_obj = new Faculty($DB,$name);

   $result = $faculty_obj->add();

   if($result)
   {
      $_SESSION['db-succ-message'] = "Faculty created successfully";
   }
   else
   {
      $_SESSION['db-err-message'] = "Unable to create faculty. Please try again";
   }
   header("location:../views/admin/faculty.php");
}


if(isset($_POST['add-department']))
{
   $faculty = htmlspecialchars(strip_tags($_POST['faculty']));
   $name = htmlspecialchars(strip_tags($_POST['name']));
   
   $department_obj = new Department($DB,(int)$faculty,$name);

   $result = $department_obj->add();

   if($result)
   {
      $_SESSION['db-succ-message'] = "Department created successfully";
   }
   else
   {
      $_SESSION['db-err-message'] = "Unable to create department. Please try again";
   }
   header("location:../views/admin/department.php");
}

if(isset($_POST['add-course']))
{
   $department = (int)htmlspecialchars(strip_tags($_POST['department']));
   $course_code = htmlspecialchars(strip_tags($_POST['course-code']));
   $course_name = htmlspecialchars(strip_tags($_POST['course-name']));

   
   $course_obj = new Course($DB,$department,$course_code,$course_name);

   $result = $course_obj->add();

   if($result)
   {
      $_SESSION['db-succ-message'] = "Course created successfully";
   }
   else
   {
      $_SESSION['db-err-message'] = "Unable to create course. Please try again";
   }
   header("location:../views/admin/course.php");
}


if(isset($_POST['add-admin']))
{
   $first_name = htmlspecialchars(strip_tags($_POST['first-name']));
   $last_name = htmlspecialchars(strip_tags($_POST['last-name']));
   $email = htmlspecialchars(strip_tags($_POST['email']));
   $password = htmlspecialchars(strip_tags($_POST['password']));

   
   $user_obj = new User($DB,$first_name,$last_name,$email,$password);

   $result = $user_obj->add_admin();

   if($result)
   {
      $_SESSION['db-succ-message'] = "Admin created successfully";
   }
   else
   {
      $_SESSION['db-err-message'] = "Unable to create admin. Please try again";
   }
   header("location:../views/admin/index.php");
}
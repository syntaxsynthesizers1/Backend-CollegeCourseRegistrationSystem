<?php
require_once("../auto_loader.php");

$DB = new Database();


// Delete session
if(isset($_GET['delete-session-id']))
{
   $id = htmlspecialchars(strip_tags($_GET['delete-session-id']));
   
   $session_obj = new session($DB);

   $result = $session_obj->delete($id);

   if($result)
   {
      $_SESSION['db-succ-message'] = "Session deleted successfully";
   }
   else
   {
      $_SESSION['db-err-message'] = "Unable to delete session. Please try again";
   }
   header("location:../views/admin/session.php");
}

// Delete semester
if(isset($_GET['delete-semester-id']))
{
   $id = htmlspecialchars(strip_tags($_GET['delete-semester-id']));
   
   $semester_obj = new semester($DB);

   $result = $semester_obj->delete($id);

   if($result)
   {
      $_SESSION['db-succ-message'] = "Semester deleted successfully";
   }
   else
   {
      $_SESSION['db-err-message'] = "Unable to delete semester. Please try again";
   }
   header("location:../views/admin/semester.php");
}

// Delete department
if(isset($_GET['delete-department-id']))
{
   $id = htmlspecialchars(strip_tags($_GET['delete-department-id']));
   
   $department_obj = new Department($DB);

   $result = $department_obj->delete($id);

   if($result)
   {
      $_SESSION['db-succ-message'] = "Department deleted successfully";
      header("location:../views/admin/department.php"); 
   }
   else
   {
      header("location:../views/admin/department.php");    
   }
}

// Delete course
if(isset($_GET['delete-course-id']))
{
   $id = htmlspecialchars(strip_tags($_GET['delete-course-id']));
   
   $department_obj = new Department($DB);

   $result = $department_obj->delete($id);

   if($result)
   {
      $_SESSION['db-succ-message'] = "Course deleted successfully";
   }
   else
   {
      $_SESSION['db-err-message'] = "Unable to delete Course. Please try again";
   }
   header("location:../views/admin/course.php");
}

// Delete student
if(isset($_GET['delete-admin-id']))
{
   $id = htmlspecialchars(strip_tags($_GET['delete-admin-id']));
   
   $user_obj = new User($DB);

   $result = $user_obj->delete($id);
   
   if($result)
   {
      $_SESSION['db-succ-message'] = "Admin deleted successfully";
   }
   else
   {
      $_SESSION['db-err-message'] = "Unable to delete admin. Please try again";
   }
   header("location:../views/admin/index.php");
}


// Delete student
if(isset($_GET['delete-student-id']))
{
   $id = htmlspecialchars(strip_tags($_GET['delete-student-id']));
   
   $user_obj = new User($DB);

   $result = $user_obj->delete($id);
   
   if($result)
   {   
      $enroll_obj = new Enroll($DB);
      $enrolled = $enroll_obj->get($id);

      if($enrolled !== [])
      {
         $enroll_obj->delete($id);
      }
      $_SESSION['db-succ-message'] = "Student deleted successfully";
   }
   else
   {
      $_SESSION['db-err-message'] = "Unable to delete student. Please try again";
   }
   header("location:../views/admin/manage_student.php");
}
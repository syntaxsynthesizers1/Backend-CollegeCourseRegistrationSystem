<?php
require_once("../auto_loader.php");

$DB = new Database();

if(isset($_POST['enroll']))
{
   $id = (int)htmlspecialchars(strip_tags($_POST['id']));
   $name = htmlspecialchars(strip_tags($_POST['name']));
   $session = htmlspecialchars(strip_tags($_POST['session']));
   $level = htmlspecialchars(strip_tags($_POST['level']));
   $semester = htmlspecialchars(strip_tags($_POST['semester']));
   $course = htmlspecialchars(strip_tags($_POST['course']));
   
   $enroll_obj = new Enroll($DB);

   $result = $enroll_obj->add($id,$name,$session,$level,$semester,$course);

   if($result)
   {
      $_SESSION['db_message'] = "Course enrolment successful";
   }
   else
   {
      $_SESSION['db_message'] = "Unable to enroll course. Please try again";
   }
   header("location:../views/student/index.php");
}


if(isset($_POST['update']))
{
   $id = (int)htmlspecialchars(strip_tags($_POST['id']));
   $student_id = (int)htmlspecialchars(strip_tags($_POST['student_id']));
   $student_name = htmlspecialchars(strip_tags($_POST['student-name']));
   $session = htmlspecialchars(strip_tags($_POST['session']));
   $level = htmlspecialchars(strip_tags($_POST['level']));
   $semester = htmlspecialchars(strip_tags($_POST['semester']));
   $course = htmlspecialchars(strip_tags($_POST['course']));
   
   $enroll_obj = new Enroll($DB);

   $result = $enroll_obj->update($id,$student_id,$student_name,$session,$level,$semester,$course);

   if($result)
   {
      $_SESSION['db-succ-message'] = "Update successful";
      header("location:../views/admin/enrolled.php");
   }
   else
   {
      $_SESSION['db-err-message'] = "Update not successful. Please try again";
      header("location:../views/admin/update_enrolled.php");
   }
}


// Delete student
if(isset($_GET['delete-id']))
{
   $id = htmlspecialchars(strip_tags($_GET['delete-id']));
   
   $enroll_obj = new Enroll($DB);

   $result = $enroll_obj->delete($id);
   
   if($result)
   {
      $_SESSION['db-succ-message'] = "Operation successful";
   }
   else
   {
      $_SESSION['db-err-message'] = "Operation not successful. Please try again";
   }
   header("location:../views/admin/enrolled.php");
}

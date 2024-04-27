<?php
 require_once("../auto_loader.php");
 $Db = new Database();

 if(isset($_POST['update-student']) || isset($_POST['admin-update-student']))
 {
     $id = $_POST['id'];
     $first_name = htmlspecialchars(strip_tags($_POST['first-name']));
     $last_name = htmlspecialchars(strip_tags($_POST['last-name']));
     $email = htmlspecialchars(strip_tags($_POST['email']));
     $gender = htmlspecialchars(strip_tags($_POST['gender']));
     $phone = htmlspecialchars(strip_tags($_POST['phone']));
     $current_image = $_POST['current-image'];

     var_dump($_POST);
     if($_FILES['image']['name'] != "")
     {
      $img_name = $_FILES['image']['name'];
      $img_ext_array = explode(".",$img_name);
      $img_ext = end($img_ext_array);
      $allowed_ext = ['jpeg','jpg','png'];
      if(in_array($img_ext,$allowed_ext))
      {
        $new_image = rand(0,100000).time().$img_name;   
        if(move_uploaded_file($_FILES['image']['tmp_name'],"../assets/images/students/".$new_image))
        {
           if($current_image != "")
           {
               $remove_img_path = "../assets/images/students/".$current_image;
               $remove = unlink($remove_img_path);
               if(!$remove)
               {
                  if(isset($_POST['update-student']))
                  {
                    $_SESSION['db_message'] = "Error: Unable to remove previous image";
                    header('location:../views/student/profile.php');
                  }
                  elseif(isset($_POST['admin-update-student']))
                  {
                    $_SESSION['db-err-message'] = "Error: Unable to remove previous image";
                    header('location:../views/admin/register_student.php');
                  }
               }
           }
        } 
      }
      else
      {
        if(isset($_POST['update-student']))
        {
          $_SESSION['db_message'] = "Error: Image extension not allowed";
          header('location:../views/student/profile.php');
        }
        elseif(isset($_POST['admin-update-student']))
        {
          $_SESSION['db-err-message'] = "Error: Image extension not allowed";
          header('location:../views/admin/register_student.php');
        }
      }
     }
     else
     {
       $new_image = $current_image;
     }

     $user_obj = new User($Db);

     $update = $user_obj->update_student($id,$first_name,$last_name,$email,$gender,$phone,$new_image);

    if($update)
    {
        if(isset($_POST['update-student']))
        {
          $_SESSION['db_message'] = "Profile updated successfully";
          header('location:../views/student/profile.php');
        }
        elseif(isset($_POST['admin-update-student']))
        {
          $_SESSION['db-succ-message'] = "Profile updated successfully";
          header('location:../views/admin/manage_student.php');
        }
    }
    else
    {
        if(isset($_POST['update-student']))
        {
          $_SESSION['db_message'] = "Error: Unable  to update profile. Plesae try again";
          header('location:../views/student/profile.php');
        }
        elseif(isset($_POST['admin-update-student']))
        {
          $_SESSION['db-err-message'] = "Error: Unable  to update profile. Plesae try again";
          header('location:../views/admin/register_student.php');
        }
    }
 }

 if(isset($_POST['update-password']))
 {
     $id = $_POST['id'];
     $current_p = htmlspecialchars(strip_tags($_POST['current-password']));
     $new_p = htmlspecialchars(strip_tags($_POST['new-password']));
     $confirm_p = htmlspecialchars(strip_tags($_POST['confirm-password']));

     $user_obj = new User($Db);

     $update = $user_obj->update_password($id,$current_p,$new_p,$confirm_p);

    if($update)
    {
        $_SESSION['db_message'] = "Password updated successfully";
        header('location:../views/student/change_password.php');
    } 
    else
    {
        header('location:../views/student/change_password.php');
    }
 }


 
 if(isset($_POST['update-faculty']))
 {
     $id =  $_POST['id'];
     $name =  htmlspecialchars(strip_tags($_POST['name']));

     $faculty_obj = new Faculty($Db);

     $update = $faculty_obj->update_faculty($id,$name);

    if($update)
    {
        $_SESSION['db-succ-message'] = "Faculty updated successfully";
        header('location:../views/admin/faculty.php');
    } 
    else
    {
      $_SESSION['db-err-message'] = "Error: unable to update faculty";
      header('location:../views/admin/update_faculty.php');
    }
 }


 if(isset($_POST['update-department']))
 {
     $id =  $_POST['id'];
     $faculty =  htmlspecialchars(strip_tags($_POST['faculty']));
     $name =  htmlspecialchars(strip_tags($_POST['name']));

     $department_obj = new Department($Db);

     $update = $department_obj->update_department($id,$faculty,$name);

    if($update)
    {
        $_SESSION['db-succ-message'] = "Department updated successfully";
        header('location:../views/admin/department.php');
    } 
    else
    {
      $_SESSION['db-err-message'] = "Error: Unable to update department";
      header('location:../views/admin/update_department.php');
    }
 }


 if(isset($_POST['update-course']))
 {
     $id =  $_POST['id'];
     $department =  htmlspecialchars(strip_tags($_POST['department']));
     $course_code =  htmlspecialchars(strip_tags($_POST['course-code']));
     $course_name =  htmlspecialchars(strip_tags($_POST['course-name']));

     $course_obj = new Course($Db);

     $update = $course_obj->update_course($id,$department,$course_code,$course_name);

    if($update)
    {
        $_SESSION['db-succ-message'] = "Course updated successfully";
        header('location:../views/admin/course.php');
    } 
    else
    {
      $_SESSION['db-err-message'] = "Error: Unable to update course";
      header('location:../views/admin/update_course.php');
    }
 }

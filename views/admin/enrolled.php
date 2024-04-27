<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/dashboard-head.php')?>

    <title>Admin Enrolled students</title>
</head>
<body>
<section class="header bg-gradient py-3">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="content text-center">
            <img src="../../assets/images/admin/department-icon.png">
                <h1 class="text-light">Enrolled Student</h1>
            </div>
        </div>
      </div>   
  </div>
</section>

<!-- Navigation -->
<?php require_once('../includes/admin-nav.php') ?>
<!-- ----------------------------------------- -->


<Section class="dashboard-table mb-5">
 <div class="container">
     <div class="row">
         <div class="col-md-12 mb-3">
             <h2 class="sub-heading">Enrolled Students</h2>
             <?php
                if(isset($_SESSION['db-succ-message']))
                {
                ?>
                    <h5  class="p-3 bg-primary text-light text-center mt-3 rounded"><?= $_SESSION['db-succ-message'] ?></h5>
                <?php			
                    unset($_SESSION['db-succ-message']);	
                }
			 ?>
         </div>
         <div class="col-md-12">
             <div class="table-responsive">
                <table class="table shadow table-hover">
                    <thead>
                        <th>S/n</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Session</th>
                        <th>Level</th>
                        <th>semester</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Date/Time</th>
                        <th colspan="2" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        <?php
                           $sn = 1;
                           if(count($enrolls) > 0)
                           {
                            foreach ($enrolls as $enrolled) 
                            {
                             ?>      
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td><?= $enrolled['student_name'] ?></td>
                                <td><?= $enroll_obj->get($enrolled['student_id'])['course_name'] ?></td>
                                <td><?= $enrolled['session'] ?></td>
                                <td><?= $enrolled['level'] ?></td>
                                <td class="text-capitalize"><?= $enrolled['semester'] ?></td>
                                <td><?= $enrolled['email'] ?></td>
                                <td> 
                                    <?php
                                        if($enrolled['img'] != "")
                                        {
                                      ?>
                                             <img src="../../assets/images/students/<?= $enrolled['img'] ?>" class="profile-img">
                                      <?php      
                                        }
                                        else
                                        {
                                        ?>
                                         <i class="fas fa-user-circle fa-2x"></i>
                                        <?php
                                        }
                                     ?>
                                </td>
                                <td><?= $enrolled['created_at'] ?></td>
                                <td class="text-center"><a href="update_enrolled.php?enrolled-id=<?= $enrolled['student_id'] ?>" class="action-button">Edit <i class="fas fa-pencil-alt"></i></a></td>
                                <td><a href="../../controllers/enroll.php?delete-id=<?= $enrolled['student_id'] ?>" class="action-button">Delete <i class="fas fa-trash"></i></a></td>
                            </tr>
                          <?php
                           }
                        }
                        else
                        {
                         ?>
                         <tr>
                             <td>
                             <h5>!No enrolled students available</h5>
                             </td>
                         </tr>
                         <?php
                        }
                        ?>
                        
                    </tbody>
                </table>
             </div>
         </div>
     </div>
 </div>
</Section>

<?php require_once('../includes/dashboard-footer.php') ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/dashboard-head.php')?>

    <title>Admin Manage student</title>
</head>
<body>
<section class="header bg-gradient py-3">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="content text-center">
            <img src="../../assets/images/admin/students-icon.png">
                <h1 class="text-light">Manage Student</h1>
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
             <h2 class="sub-heading">Manage Students</h2>
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
                <table class="table  shadow table-hover">
                    <thead>
                        <th>S/n</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th colspan="2" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        <?php
                           $sn = 1;
                           if(count($students) > 0)
                           {
                            foreach ($students as $student) 
                            {
                             ?>      
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td><?= $student['first_name'] ?></td>
                                <td><?= $student['last_name'] ?></td>
                                <td><?= $student['email'] ?></td>
                                <td><?= $student['phone'] ? $student['phone'] : "Empty!" ?></td>
                                <td class="text-capitalize"><?= $student['gender'] ? $student['gender'] : "Empty!" ?></td>
                                <td> 
                                    <?php
                                        if($student['img'] != "")
                                        {
                                      ?>
                                             <img src="../../assets/images/students/<?= $student['img'] ?>" class="profile-img">
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
                                <td><?= $student['created_at'] ?></td>
                                <td class="text-center"><a href="update_student.php?student-id=<?= $student['id'] ?>" class="action-button">Edit <i class="fas fa-pencil-alt"></i></a></td>
                                <td><a href="../../controllers/delete.php?delete-student-id=<?= $student['id'] ?>" class="action-button">Delete <i class="fas fa-trash"></i></a></td>
                            </tr>
                          <?php
                           }
                        }
                        else
                        {
                         ?>
                         <tr>
                             <td>
                             <h5>!No students available</h5>
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
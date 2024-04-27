<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/dashboard-head.php')?>

    <title>Admin Courses</title>
</head>
<body>
<section class="header bg-gradient py-3">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="content text-center">
            <img src="../../assets/images/admin/course-icon.png">
                <h1 class="text-light">Manage Courses</h1>
            </div>
        </div>
      </div>   
  </div>
</section>

<!-- Navigation -->
<?php require_once('../includes/admin-nav.php') ?>
<!-- ----------------------------------------- -->

<section class="dashboard-form">
  <div class="container">
      <div class="row justify-content-center shadow align-items-center py-3">
          <div class="col-md-3 left">
              <div class="img">
                  <img src="../../assets/images/admin/add-course.png" width="100%">
              </div>
          </div>
          <div class="col-md-6">
              <div class="content ms-md-4">
                  <h2 class="sub-heading">Create Course</h2>
                  <?php
                        if(isset($_SESSION['db-err-message']))
						{
						?>
							<h5  class="p-3 bg-primary text-light text-center mt-3 rounded"><?= $_SESSION['db-err-message'] ?></h5>
						<?php			
							unset($_SESSION['db-err-message']);	
						}
				  ?>
                  <form action="../../controllers/create.php" method="post" class="mt-5">
                    <select name="department" id="">
                      <option value="">Choose department...</option>
                      <?php
                          foreach($departments as $department)
                        {
                        ?> 
                          <option value="<?=$department['id']?>"><?=$department['name'] ?></option>
                        <?php
                        }
                      ?>
                    </select>
                    <input type="text" name="course-code" placeholder="Enter Course code" required>
                    <input type="text" name="course-name" placeholder="Enter Course name" required>
                    <input type="hidden" name="add-course">
                    <button>Create <i class="fas fa-plus"></i></button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>

<Section class="dashboard-table mb-5">
 <div class="container">
     <div class="row">
         <div class="col-md-12 mb-3">
             <h2 class="sub-heading">Manage Courses</h2>
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
                        <th>Course name</th>
                        <th>Course code</th>
                        <th>Department</th>
                        <th>Created at</th>
                        <th class="text-center" colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php
                           $sn = 1;
                           if(count($courses) > 0)
                           {
                            foreach ($courses as $course) 
                            {
                             ?>      
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td><?= $course['course_name'] ?></td>
                                <td><?= $course['course_code'] ?></td>
                                <td><?= $course['department_name'] ?></td>
                                <td><?= $course['created_at'] ?></td>
                                <td class="text-center"><a href="update_course.php?course-id=<?= $course['course_id'] ?>" class="action-button">Edit <i class="fas fa-pencil-alt"></i></a></td>
                                <td><a href="../../controllers/delete.php?delete-course-id=<?= $course['id'] ?>" class="action-button">Delete <i class="fas fa-trash"></i></a></td>
                            </tr>
                          <?php
                           }
                        }
                        else
                        {
                         ?>
                         <tr>
                             <td>
                             <h5>!No courses available</h5>
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
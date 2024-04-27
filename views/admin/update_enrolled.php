<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/dashboard-head.php')?>

    <title>Admin Update enrolled</title>
</head>
<body>
<section class="header bg-gradient py-3">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="content text-center">
            <img src="../../assets/images/admin/students-icon.png">
                <h1 class="text-light">Update enrolled</h1>
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
                  <img src="../../assets/images/admin/add-student.png" width="100%">
              </div>
          </div>
          <div class="col-md-6">
              <div class="content ms-md-4">
                <div><h2 class="sub-heading">Update Enrolled</h2></div>
                  <?php
                        if(isset($_SESSION['db-err-message']))
						{
						?>
							<h5  class="p-3 bg-primary text-light text-center mt-3 rounded"><?= $_SESSION['db-err-message'] ?></h5>
						<?php			
							unset($_SESSION['db-err-message']);	
						}
				  ?>
                  <form action="../../controllers/enroll.php" method="post" class="mt-5"  enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $enrolled['enrolled_id']?>">
                    <input type="hidden" name="student_id" value="<?= $enrolled['student_id']?>">
                    <input type="text" name="student-name" placeholder="Full name" value="<?= $enrolled['student_name']?>">
                        <select name="session">
                            <option value="">Session...</option>
                            <?php
                                foreach($sessions as $session)
                                {
                                ?>
                                    <option value="<?= $session['session'] ?>" <?= $enrolled['session'] == $session['session'] ? "selected" :"" ?> ><?= $session['session'] ?></option>
                                <?php     
                                }
                            ?>                                      
                        </select>

                            
                        <select name="level">
                            <option value="">Level...</option>
                            <option value="100" <?= $enrolled['level'] == "100" ? "selected" :"" ?> >Level 100</option>  
                            <option value="200" <?= $enrolled['level'] == "200" ? "selected" :"" ?>>Level 200</option>  
                            <option value="300" <?= $enrolled['level'] == "300" ? "selected" :"" ?>>Level 300</option>  
                            <option value="400" <?= $enrolled['level'] == "400" ? "selected" :"" ?>>Level 400</option>  
                        </select>

                        <select name="semester" class="text-capitalize">
                            <option value="">Semester...</option>
                            <?php
                                foreach($semesters as $semester)
                                {
                                ?>
                                    <option value="<?= $semester['semester'] ?>" <?= $enrolled['semester'] == $semester['semester'] ? "selected" :"" ?> ><span class="text-uppercase"><?= $semester['semester'] ?></span></option>
                                <?php     
                                }
                                ?>                                      
                        </select>

                        <select name="course" class="text-capitalize">
                            <option value="">Course...</option>
                            <?php
                                foreach($courses as $course)
                                {
                                ?>
                                    <option value="<?= $course['course_id'] ?>"  <?= $enrolled['course'] == $course['course_id'] ? "selected" :"" ?> ><span class="text-uppercase"><?= $course['name'] ?></span></option>
                                <?php     
                                }
                                ?>                                      
                        </select>
                    <input type="hidden" name="update"> 
                    <button>Update <i class="fas fas fa-pencil-alt"></i></button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>
<?php require_once('../includes/dashboard-footer.php') ?>
</body>
</html>
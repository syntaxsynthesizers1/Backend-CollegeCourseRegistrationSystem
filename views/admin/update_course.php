<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/dashboard-head.php')?>

    <title>Admin Update course</title>
</head>
<body>
<section class="header bg-gradient py-3">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="content text-center">
            <img src="../../assets/images/admin/course-icon.png">
                <h1 class="text-light">Update Course</h1>
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
                  <h2 class="sub-heading">Update Course</h2>
                  <?php
                        if(isset($_SESSION['db-err-message']))
						{
						?>
							<h5  class="p-3 bg-primary text-light text-center mt-3 rounded"><?= $_SESSION['db-err-message'] ?></h5>
						<?php			
							unset($_SESSION['db-err-message']);	
						}
				  ?>
                  <form action="../../controllers/update.php" method="post" class="mt-5">
                    <select name="department" id="">
                      <option value="">Choose department...</option>
                      <?php
                          foreach($departments as $department)
                        {
                        ?> 
                          <option value="<?=$department['id']?>" <?= $department['id'] == $course['department'] ? "selected": "" ?>><?=$department['name'] ?></option>
                        <?php
                        }
                      ?>
                    </select>
                    <input type="text" name="course-code" value="<?= $course['course_code'] ?>" placeholder="Enter Course code" required>
                    <input type="text" name="course-name" value="<?= $course['course_name'] ?>" placeholder="Enter Course name" required>
                    <input type="hidden" name="id" value="<?= $course['id'] ?>">
                    <input type="hidden" name="update-course">
                    <button>Update <i class="fas fa-pencil-alt"></i></button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>
<?php require_once('../includes/dashboard-footer.php') ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/dashboard-head.php')?>

    <title>Dashboard - password</title>
</head>
<body>
<section class="header bg-gradient py-3">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="content text-center">
            <img src="../../assets/images/admin/password-icon.png">
                <h1 class="text-light">Student Password</h1>
            </div>
        </div>
      </div>   
  </div>
</section>

<!-- Navigation -->
<?php require_once('../includes/student-nav.php') ?>
<!-- ----------------------------------------- -->

<section class="dashboard-form mb-5">
  <div class="container">
      <div class="row justify-content-center shadow align-items-center py-3 rounded">
          <div class="col-md-3 left">
              <div class="img">
                  <img src="../../assets/images/admin/password.png" width="100%">
              </div>
          </div>
          <div class="col-md-6">
              <div class="content ms-md-4">
                    <div><h2 class="sub-heading">Change password</h2></div>
                  <?php
                        if(isset($_SESSION['db_message']))
						{
						?>
							<h5  class="p-3 bg-primary text-light text-center mt-3 rounded"><?= $_SESSION['db_message'] ?></h5>
						<?php			
							unset($_SESSION['db_message']);	
						}
				  ?>
                  <form action="../../controllers/update.php" method="post" class="mt-5">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <input type="password" name="current-password" placeholder="Current password" required>
                    <input type="password" name="new-password" placeholder="New password" required>
                    <input type="password" name="confirm-password" placeholder="Confirm password" required>
                    <input type="hidden" name="update-password"> 
                    <button>Update <i class="fas fa-plus"></i></button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>



<?php require_once('../includes/dashboard-footer.php') ?>
</body>
</html>
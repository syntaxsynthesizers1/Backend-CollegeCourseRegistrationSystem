<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/dashboard-head.php')?>

    <title>Admin Register student</title>
</head>
<body>
<section class="header bg-gradient py-3">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="content text-center">
            <img src="../../assets/images/admin/student-reg-icon.png">
                <h1 class="text-light">Register student</h1>
            </div>
        </div>
      </div>   
  </div>
</section>

<!-- Navigation -->
<?php require_once('../includes/admin-nav.php') ?>
<!-- ----------------------------------------- -->

<section class="dashboard-form mb-5">
  <div class="container">
      <div class="row justify-content-center shadow align-items-center rounded">
          <div class="col-md-3 left">
              <div class="img">
                  <img src="../../assets/images/admin/add-student.png" width="100%">
              </div>
          </div>
          <div class="col-md-6">
              <div class="content ms-md-4">
                  <h2 class="sub-heading">Register Student</h2>
                  <?php
                        if(isset($_SESSION['sl_err_message']))
						{
						?>
							<h5  class="p-3 bg-primary text-light text-center mt-3 rounded"><?= $_SESSION['sl_err_message'] ?></h5>
						<?php			
							unset($_SESSION['sl_err_message']);	
						}
				  ?>
                  <form action="../../controllers/signup.php" method="post" class="mt-5">
                    <input type="text" name="first-name" placeholder="First name" required>
                    <input type="text" name="last-name" placeholder="Last name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Enter password" required>
                    <input type="password" name="password-r" placeholder="Confirm password" required>
                    <input type="hidden" name="add-student">
                    <button>Create <i class="fas fa-plus"></i></button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>

<?php require_once('../includes/dashboard-footer.php') ?>
</body>
</html>
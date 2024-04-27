<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/dashboard-head.php')?>

    <title>Dashboard - profile</title>
</head>
<body>
<section class="header bg-gradient py-3">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="content text-center">
            <img src="../../assets/images/admin/profile-icon.png">
                <h1 class="text-light">Student Profile</h1>
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
                  <img src="../../assets/images/admin/profile.png" width="100%">
              </div>
          </div>
          <div class="col-md-6">
              <div class="content ms-md-4">
                  <div class="d-flex justify-content-between align-items-center">
                    <div><h2 class="sub-heading">Update profile</h2></div>
                    <?php
                        if($user['img'] != "")
                        {
                        ?>
                                <img src="../../assets/images/students/<?= $user['img'] ?>" class="profile-img profile-img-dark">
                        <?php      
                        }
                        else
                        {
                        ?>
                            <i class="fas fa-user-circle fa-4x"></i>
                        <?php
                        }
                    ?>
                  </div>
                  <?php
                        if(isset($_SESSION['db_message']))
						{
						?>
							<h5  class="p-3 bg-primary text-light text-center mt-3 rounded"><?= $_SESSION['db_message'] ?></h5>
						<?php			
							unset($_SESSION['db_message']);	
						}
				  ?>
                  <form action="../../controllers/update.php" method="post" class="mt-5"  enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $user['id']?>">
                    <input type="text" name="first-name" placeholder="First name" value="<?= $user['first_name']?>" readonly>
                    <input type="text" name="last-name" placeholder="Last name" value="<?= $user['last_name']?>" readonly>
                    <input type="email" name="email" placeholder="Email" value="<?= $user['email']?>" readonly>
                    <select name="gender">
                        <option value="">Gender...</option>
                        <option value="male" <?= $user['gender'] == "male" ? "selected" :"" ?>>Male</option>
                        <option value="female" <?= $user['gender'] == "female" ? "selected" :"" ?>>Female</option>
                    </select>
                    <input type="text" minlength="10" maxlength="11" name="phone" placeholder="phone" value="<?= isset($user['phone']) ? $user['phone'] : "" ?>">
                    <div class="mt-2">
                        <span class="fs-5 fw-bold text-secondary ms-2">Image</span>
                        <input type="file" name="image">
                        <input type="hidden" name="current-image" value="<?= $user['img'] ?>">
                    </div>
                    <input type="hidden" name="update-student"> 
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
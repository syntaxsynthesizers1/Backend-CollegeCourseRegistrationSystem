<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/dashboard-head.php')?>

    <title>Admin Home</title>
</head>
<body>
<section class="header bg-gradient py-3">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="content text-center">
            <img src="../../assets/images/admin/admin-icon.png">
                <h1 class="text-light">Admin Dashboard</h1>
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
      <div class="row justify-content-center shadow align-items-center py-3 rounded">
          <div class="col-md-3 left">
              <div class="img">
                  <img src="../../assets/images/admin/add-admin.png" width="100%">
              </div>
          </div>
          <div class="col-md-6">
              <div class="content ms-md-4">
                  <h2 class="sub-heading">Create Admin</h2>
                  <?php
                        if(isset($_SESSION['db_err_message']))
						{
						?>
							<h5  class="p-3 bg-primary text-light text-center mt-3 rounded">Error: <?= $_SESSION['db_err_message'] ?></h5>
						<?php			
							unset($_SESSION['db_err_message']);	
						}
				  ?>
                  <form action="../../controllers/create.php" method="post" class="mt-5">
                    <input type="text" name="first-name" placeholder="First name" required>
                    <input type="text" name="last-name" placeholder="Last name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Enter password" required>
                    <input type="hidden" name="add-admin">
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
             <h2 class="sub-heading">Manage Admins</h2>
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
                        <th>Created at</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                           $sn = 1;
                           if(count($admins) > 0)
                           {
                            foreach ($admins as $admin) 
                            {
                             ?>      
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td><?= $admin['first_name'] ?></td>
                                <td><?= $admin['last_name'] ?></td>
                                <td><?= $admin['email'] ?></td>
                                <td><?= $admin['created_at'] ?></td>
                                <td><a href="../../controllers/delete.php?delete-admin-id=<?= $admin['id'] ?>" class="action-button">Delete <i class="fas fa-trash"></i></a></td>
                            </tr>
                          <?php
                           }
                        }
                        else
                        {
                         ?>
                         <tr>
                             <td>
                             <h5>!No admins available</h5>
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
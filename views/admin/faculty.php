<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/dashboard-head.php')?>

    <title>Admin Faculty</title>
</head>
<body>
<section class="header bg-gradient py-3">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="content text-center">
            <img src="../../assets/images/admin/faculty-icon.png">
                <h1 class="text-light">Manage Faculty</h1>
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
      <div class="row justify-content-center shadow align-items-center py-3 rounded">
          <div class="col-md-3 left">
              <div class="img">
                  <img src="../../assets/images/admin/faculty.png" width="100%">
              </div>
          </div>
          <div class="col-md-6">
              <div class="content ms-md-4">
                  <h2 class="sub-heading">Create Faculty</h2>
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
                    <input type="text" name="name" placeholder="Enter faculty" required>
                    <input type="hidden" name="add-faculty">
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
             <h2 class="sub-heading">Manage Faculties</h2>
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
                        <th>Faculty</th>
                        <th>Created at</th>
                        <th colspan="2" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        <?php
                           $sn = 1;
                           if(count($faculties) > 0)
                           {
                            foreach ($faculties as $faculty) 
                            {
                             ?>      
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td><?= $faculty['name'] ?></td>
                                <td><?= $faculty['created_at'] ?></td>
                                <td class="text-center"><a href="update_faculty.php?faculty-id=<?= $faculty['id'] ?>" class="action-button">Edit <i class="fas fa-pencil-alt"></i></a></td>
                                <td><a href="../../controllers/delete.php?delete-faculty-id=<?= $faculty['id'] ?>" class="action-button">Delete <i class="fas fa-trash"></i></a></td>
                            </tr>
                          <?php
                           }
                        }
                        else
                        {
                         ?>
                         <tr>
                             <td>
                             <h5>!No faculties available</h5>
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
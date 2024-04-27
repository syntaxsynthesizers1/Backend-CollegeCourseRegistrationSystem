<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('../includes/dashboard-head.php')?>

    <title>Dashboard - Course enrollment</title>
</head>
<body>
<section class="header bg-gradient py-3">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="content text-center">
                <?php 
                  if($user['verified'] !=1 )
                  {
                ?>
                 <img src="../../assets/images/admin/email-icon.png">
                 <h1 class="text-light">Verify email</h1>
                <?php
                  }
                  else
                  {
                  ?>
                    <img src="../../assets/images/admin/course-reg-icon.png">
                    <h1 class="text-light">Course enrollment</h1>
                  <?php    
                  }
                ?>
                
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
      <div class="row justify-content-center align-items-center py-3">
          <?php
            if($user['verified'] != 1)
            {
          ?>
            <div class="col-md-6">
              <div class="content shadow p-0 rounded">
                <div class="bg-gradient rounded text-light p-3">
                   <h4>Email verification</h4>
                   <h6 class="text-light d-block" style="max-width:300px">
                       Please verify your email before you can proceed with course enrollment.
                   </h6>
                </div>
                <div class="p-3 mt-3">
                     <p class=" fs-5"><span><b>Email: </b></span> <?= $user['email'] ?></p> 

                     <a href="../../controllers/verify.php?email=<?= $user['email'] ?>" class="text-decoration-none text-light d-inline-block blue-bg p-2 rounded fw-bold fs-5">Verify <i class="fas fa-paper-plane"></i></a>
                </div>
              </div>
            </div>
           <?php     
            }
            elseif($user['verified'] == 1 && !array_search($user['id'], $enrolled))
            {
            ?>
                <div class="col-md-8 shadow rounded">
                    <div class="content ms-md-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><h2 class="sub-heading">Enroll for course</h2></div>
                            <?php
                                if($user['img'] != "")
                                {
                                ?>
                                        <img src="../../assets/images/students/<?= $user['img'] ?>" class="profile-img">
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
                        <form action="../../controllers/enroll.php" method="post" class="mt-5"  enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $user['id']?>">
                            <input type="text" name="name" placeholder="First name" value=" <?= $user['last_name']?> <?= $user['first_name']?>" readonly>

                            <select name="session">
                                <option value="">Session...</option>
                                <?php
                                    foreach($sessions as $session)
                                    {
                                  ?>
                                     <option value="<?= $session['session'] ?>"><?= $session['session'] ?></option>
                                  <?php     
                                    }
                                  ?>                                      
                            </select>

                            
                            <select name="level">
                                <option value="">Level...</option>
                                <option value="100">Level 100</option>  
                                <option value="200">Level 200</option>  
                                <option value="300">Level 300</option>  
                                <option value="400">Level 400</option>  
                            </select>

                            <select name="semester" class="text-capitalize">
                                <option value="">Semester...</option>
                                <?php
                                    foreach($semesters as $semester)
                                    {
                                  ?>
                                     <option value="<?= $semester['semester'] ?>"><span class="text-uppercase"><?= $semester['semester'] ?></span></option>
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
                                     <option value="<?= $course['course_id'] ?>"><span class="text-uppercase"><?= $course['name'] ?></span></option>
                                  <?php     
                                    }
                                  ?>                                      
                            </select>
                          
                            <input type="hidden" name="enroll"> 
                            <button>Enroll <i class="fas fa-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            <?php
            }
            else
            {
              ?>
              <div class="col-md-8">
                  <div class="content ms-md-4 blue-bg shadow rounded py-3 px-5">
                      <div class="d-flex justify-content-between align-items-center">
                          <div><h2 class="text-light ">Enrollment Successful</h2></div>
                          <?php
                              if($user['img'] != "")
                              {
                              ?>
                                    <img src="../../assets/images/students/<?= $user['img'] ?>" class="profile-img profile-img-light"> 
                              <?php      
                              }
                              else
                              {
                              ?>
                                  <i class="fas fa-user-circle fa-4x text-light"></i>
                              <?php
                              }
                          ?>  
                       </div>
                     <table class="table text-light fs-5 mt-5">
                       <?php 
                             $department = $department_obj->get($enrolled['department']);
                       ?>
                       <tr>
                        <th>Full name</th><td class="text-end"><?= $enrolled['student_name'] ?></td>
                       </tr>
                       <tr>
                        <th>Email</th><td class="text-end"><?= $user['email'] ?></td>
                       </tr>
                       <tr>
                        <th>Phone</th><td class="text-end"><?= $user['phone'] ?></td>
                       </tr>
                       <tr>
                        <th>Gender</th><td class="text-end text-capitalize"><?= $user['gender'] ?></td>
                       </tr>
                       <tr>
                        <th>Session</th><td class="text-end"><?= $enrolled['session'] ?></td>
                       </tr>
                       <tr>
                        <th>Level</th><td class="text-end"><?= $enrolled['level'] ?></td>
                       </tr>
                       <tr>
                        <th>Semester</th><td class="text-end text-capitalize"><?= $enrolled['semester'] ?></td>
                       </tr>
                       <tr>
                        <th>Course</th><td class="text-end"><?= $enrolled['course_name'] ?></td>
                       </tr>
                       <tr>
                        <th>Department</th><td class="text-end"><?= $department['name'] ?></td>
                       </tr>
                       <tr>
                        <th>Faculty</th><td class="text-end"><?= $department['faculty'] ?></td>
                       </tr>
                       <tr>
                        <th>Date/Time</th><td class="text-end"><?= $enrolled['created_at'] ?></td>
                       </tr>
                     </table>
                  </div>
              </div>

            <?php
            }
          ?>
      </div>
  </div>
</section>



<?php require_once('../includes/dashboard-footer.php') ?>
</body>
</html>
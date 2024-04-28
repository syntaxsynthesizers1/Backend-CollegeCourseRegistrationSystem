<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once('includes/head.php')?>
    
    <title>Login</title>
</head>
<body>   
<section class="login-signup">
   <div class="container-fluid">
       <div class="row" style="height:100vh">
           <div class="col-md-6 content bg-gradient">
                <img src="../assets/images/admin/cog-bg.png" width="35%" srcset="">
                <div class="row justify-content-center align-items-center" style="height:100vh;">
                    <div class="col-md-10 px-3">
                        <small class="text-light">Online</small>
                        <h1>Course Registration</h1>
                        <?php
                        if(isset($_SESSION['sl_err_message']))
						{
						?>
							<h5  class="p-3 bg-primary text-light text-center rounded">Error: <?= $_SESSION['sl_err_message'] ?></h5>
						<?php			
							unset($_SESSION['sl_err_message']);	
						}
						?>
                        <form action="../controllers/login.php" method="post">
                            <input type="email" name="email" placeholder="Enter email" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <input type="hidden" name="login">
                            <button>Login</button>
                            <div class="text-light text-center fs-5 position-relative zindex-dropdown">Don't have an account? <a href="signup.php" class="text-light fs-5"><b>Signup</b></a></div>

                        </form>
                    </div>
                </div>              
           </div>
           <div class="col-md-6 align-self-center d-none d-md-block">
             <img src="../assets/images/admin/login.png" width="100%">
           </div>
       </div>
   </div>
</section>

<?php require_once("includes/footer.php")?>
</body>
</html>
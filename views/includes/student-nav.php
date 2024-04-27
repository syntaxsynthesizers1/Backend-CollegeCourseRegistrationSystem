<section class="navigation">
    <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#"> <b><?= $user['first_name'] ?></b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-md-3">
                <a class="nav-link" aria-current="page" href="index.php">Enroll for course</a>
                </li>
                <li class="nav-item me-md-3">
                <a class="nav-link" href="profile.php">My profile</a>
                </li>
                <li class="nav-item me-md-3">
                <a class="nav-link" href="change_password.php">Change password</a>
                </li>
                <li class="nav-item me-md-3">
                <a class="nav-link" href="../../controllers/logout.php"><b>Logout</b></a>
                </li>
              
            </ul>
        </div>
    </div>
    </nav>
</section>
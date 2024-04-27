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
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item me-md-3">
                <a class="nav-link" aria-current="page" href="session.php">Session</a>
                </li>
                <li class="nav-item me-md-3">
                <a class="nav-link" href="semester.php">Semester</a>
                </li>
                <li class="nav-item me-md-3">
                <a class="nav-link" href="faculty.php">Faculty</a>
                </li>
                <li class="nav-item me-md-3">
                <a class="nav-link" href="department.php">Department</a>
                </li>
                <li class="nav-item me-md-3">
                <a class="nav-link" href="course.php">Course</a>
                </li>
                <li class="nav-item dropdown me-md-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Student
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="register_student.php">Register student</a></li>
                    <li><a class="dropdown-item" href="manage_student.php">Manage student</a></li>
                    <li><a class="dropdown-item" href="enrolled.php">Enrolled</a></li>
                </ul>
                </li>
                <li class="nav-item me-md-3">
                <a class="nav-link" href="../../controllers/logout.php"><b>Logout</b></a>
                </li>
              
            </ul>
        </div>
    </div>
    </nav>
</section>
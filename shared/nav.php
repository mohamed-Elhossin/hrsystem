<?php
session_start();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location: /final/admin/login.php");
}

?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/final/index.php">LearnIT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION['admin']) || isset($_SESSION['hr']) ): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Employees
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/final/employees/addEmployee.php">Add Employee</a>
                    <a class="dropdown-item" href="/final/employees/listEmployees.php">List All Employees</a>
                    <a class="dropdown-item" href="/final/employees/joinData.php">Join Data</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Departments
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/final/departments/addDep.php">Add Department</a>
                    <a class="dropdown-item" href="/final/departments/listDep.php">List All Departments</a>
                </div>
            </li>
        </ul>
        <form action="">
            <button name="logout" class="btn btn-outline-danger my-2 mx-2 my-sm-0">LogOut</button>
        </form>
        <?php else: ?>
        <a href="/final/admin/login.php" class="btn btn-outline-info my-2 my-sm-0">Login</a>
        <?php endif; ?>
    </div>
</nav>
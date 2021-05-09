<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../genral/configDatabse.php';

if (isset($_POST['login'])) {
    $name = $_POST['user'];
    $pass = $_POST['pass'];
    if ($_POST['role'] == "admin") {
        $select = "SELECT * FROM `admin` WHERE name = '$name' and password = '$pass' ";
        $s = mysqli_query($conn, $select);
        $numRows = mysqli_num_rows($s);
        if ($numRows > 0) {
            $_SESSION['admin'] = $name;
            header('location:/final/employees/listEmployees.php');
        } else {
            echo "<div class='alert alert-danger'>
    <h1 class='text-center text-info display-4'>  Not Admin Try Agin  </h1>
    </div>";
        }
    } elseif ($_POST['role'] == "employee") {
        $select = "SELECT * FROM `employees`  WHERE name = '$name' and id = '$pass' and depID =1 ";
        $s = mysqli_query($conn, $select);
        $numRows = mysqli_num_rows($s);
        if ($numRows > 0) {
            $_SESSION['hr'] = $name;
            echo "<div class='alert alert-info'>
            <h1 class='text-center text-info display-4'>  True Employee  </h1>
            </div>";
        } else {
            echo "<div class='alert alert-danger'>
    <h1 class='text-center text-info display-4'>  Not employee Try Agin  </h1>
    </div>";
        }
    }
}
?>
<h1 class="text-center text-primary display-3"> Login Page </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                <div class="fomr-group">
                    <label for=""> User Name</label>
                    <input type="text" name="user" class="form-control">
                </div>
                <div class="fomr-group">
                    <label for=""> Password </label>
                    <input type="password" name="pass" class="form-control">
                </div>
                <div class="fomr-group">
                    <button name="login" class="btn btn-info w-100 mt-2"> Login </button>
                </div>
                <div class="fomr-group">
                    <label for=""> Role </label>
                    <select name="role" class="form-control">
                    <option value="admin"> Admin </option>
                    <option value="employee"> Emlpoyee </option>
                    <select>
                </div>
            </form>

        </div>
    </div>
</div>


</div>
<?php include '../shared/script.php';  ?>
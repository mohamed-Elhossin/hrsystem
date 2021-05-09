<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../genral/configDatabse.php';

include '../genral/functionality.php';
auth();
if (isset($_GET['send'])) {
    $name = $_GET['name'];
    $insert = "INSERT INTO `departments` VALUES (NULL ,'$name' )";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "insert To DataBase");
}
// List aLL department

?>
<h1 class="text-center text-primary display-3"> Add Departments Page </h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label> Departments Name </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <button name="send" class="btn btn-primary btn-block"> Send Data </button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include '../shared/script.php';  ?>
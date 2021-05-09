<?php
    include '../shared/header.php';
    include '../shared/nav.php';
    include '../genral/configDatabse.php';
    include '../genral/functionality.php';
    
    
if (isset($_SESSION['admin']) == "mohamed") {
        if (isset($_POST['send'])) {
            $name = $_POST['name'];
            $salary = $_POST['salary'];
            $depID = $_POST['depId'];

            $insert = "INSERT INTO `employees` VALUES (NULL ,'$name' , $salary ,  $depID )";
            $i = mysqli_query($conn, $insert);
            testMessage($i, "insert To DataBase");
        }
        // List aLL department
        $select= "SELECT * FROM `departments`";
        $s = mysqli_query($conn, $select);

        // edit Part
        $name = "";
        $salary ="";
        $update = false;
        if (isset($_GET['edit'])) {
            $update =true;
            $id = $_GET['edit'];
            $select= "SELECT * FROM `employees` where id = $id";
            $ss = mysqli_query($conn, $select);
            $row = mysqli_fetch_assoc($ss);
            $name = $row['name'];
            $salary = $row['salary'];

            if (isset($_POST['update'])) {
                $name = $_POST['name'];
                $salary = $_POST['salary'];
                $depID = $_POST['depId'];
                $update = "update `employees` Set  name= '$name' , salary= $salary , depID = $depID where id =$id";
                $i = mysqli_query($conn, $update);
                header("location:/final/employees/listEmployees.php");
            }
        }
        auth(); 
  ?>
<h1 class="text-center text-primary display-3"> Add Employee Page </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label> Employee Name </label>
                    <input type="text" value="<?php echo $name ?>" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label> Employee Salary </label>
                    <input type="number" value="<?php echo $salary ?>" name="salary" class="form-control">
                </div>
                <div class="form-group">
                    <label> Employee Department </label>
                    <!-- <input type="number" name="depId" class="form-control"> -->
                    <select name="depId" class="form-control">
                    <?php foreach ($s as $data) { ?>
                        <option value=" <?php echo $data['id'] ?> "> <?php echo $data['name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                <?php if ($update): ?>
                <button name="update" class="btn btn-info btn-block"> Update Data </button>
      <?php else: ?>
                    <button name="send" class="btn btn-primary btn-block"> Send Data </button>
           <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>



<?php 
    } else {?>
<h1 class="text-center text-primary display-3">Not Auathraized </h1>

<?php }
include '../shared/script.php';?>
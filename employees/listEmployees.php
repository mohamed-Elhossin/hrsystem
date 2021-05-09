<?php

include '../shared/header.php';
include '../shared/nav.php';
include '../genral/configDatabse.php';
include '../genral/functionality.php';
auth();
$select= "SELECT * FROM `employees`";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id =$_GET['delete'];
    $delete = "DELETE FROM `employees` WHERE id =$id";
    $d = mysqli_query($conn, $delete);
    header('location: /final/employees/listEmployees.php') ;
}


?>

<h1 class="text-center text-info display-3"> List Employees Page </h1>


<div class="container col-6">
    <table class="table table-hover">
     <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Salary</th>
      <th>depId</th>
      <th>Action</th>
     </tr>
   
     <?php foreach ($s as $data) { ?>
        <tr>
     <td><?php echo $data['id'] ?></td>
     <td><?php echo $data['name'] ?></td>
     <td><?php echo $data['salary'] ?></td>
     <td><?php echo $data['depID'] ?></td>
    
     <?php    if (isset($_SESSION['admin']) == "mohamed") { ?> 
      <td>
       <a href="addEmployee.php?edit=<?php echo $data['id']?>" class="btn btn-primary">Edit</a>
       <a  
       onclick="return confirm('Are You sure')"
       href="listEmployees.php?delete=<?php echo $data['id']?>" class="btn btn-danger">Delete</a>
       </td>
      <?php }else{ ?>
      
    
      <td> 
       <button onclick="alert('انت عبيط يابني')" disabled class="btn btn-primary">Edit</button>
       <button disabled class="btn btn-danger">Delete</button>
      <?php }?>
      
      </td>
     </tr>

     <?php  }?>
    </table>
</div>


<?php include '../shared/script.php';  ?>
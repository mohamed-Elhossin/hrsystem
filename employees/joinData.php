<?php

include '../shared/header.php';
include '../shared/nav.php';
include '../genral/configDatabse.php';
include '../genral/functionality.php';
auth();
$select= "SELECT employees.name emp ,departments.name dep FROM `employees` JOIN departments on employees.depID = departments.id
";
$s = mysqli_query($conn, $select);

?>

<h1 class="text-center text-info display-4"> Join Employees With Department </h1>


<div class="container col-6">
    <table class="table table-hover">
     <tr>

      <th>Employee</th>
      <th>Department</th>

     </tr>
   
     <?php foreach ($s as $data) { ?>
        <tr>
     <td><?php echo $data['emp'] ?></td>
     <td><?php echo $data['dep'] ?></td>
     </tr>

     <?php  }?>
    </table>
</div>


<?php include '../shared/script.php';  ?>
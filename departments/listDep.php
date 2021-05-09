<?php

include '../shared/header.php';
include '../shared/nav.php';
include '../genral/configDatabse.php';
include '../genral/functionality.php';
auth();

$select= "SELECT * FROM `departments`";
$s = mysqli_query($conn, $select);

?>

<h1 class="text-center text-primary display-3"> List departments Page </h1>


<div class="container col-6">
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <?php foreach ($s as $data) { ?>
        <tr>
            <td><?php echo $data['id'] ?></td>
            <td><?php echo $data['name'] ?></td>
        </tr>
        <?php  }?>
    </table>
</div>


<?php include '../shared/script.php';  ?>
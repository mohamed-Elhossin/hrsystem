<?php
function testMessage($condation, $mess)
{
    if ($condation) {
        echo "<div class='alert alert-info'>
<h1 class='text-center text-info display-4'> $mess Is True </h1>
</div>";
    } else {
        echo "<div class='alert alert-danger'>
    <h1 class='text-center text-info display-4'>  $mess Is False</h1>
    </div>";
    }
}
function auth(){
    if(isset($_SESSION['admin']) || isset($_SESSION['hr'])){

    }else{
        header("location: /final/admin/login.php");
    }
    
}
?>
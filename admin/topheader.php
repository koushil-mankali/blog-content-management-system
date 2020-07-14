<?php
session_start();
if(isset($_SESSION['uname'])||isset($_SESSION['upass'])|| isset($_SESSION['urole'])||isset($_SESSION['uid'])){
    
}else{
     header("location:index.php");
}
if(isset($_REQUEST['logout'])){
    session_unset();
    session_destroy();
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="Btitle">
            <h1><a href="../admin/dashboard.php"><i class="fa fa-home"></i> BlogCMS</a> <i class="fa fa-bars fa-sm abars" aria-hidden="true"></i> <form action="" method="POST" class="logoutf" style="display:inline-block; float:right; margin-right:20px;"><input class="btn btn-info" type="submit" name="logout" value="Logout"></form></h1>        
</div>
<script src="../javascript/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('.abars').click(function(){
            $('.innera').toggle(500);
        });
    });
</script>
</body>
</html>
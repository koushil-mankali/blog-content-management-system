<?php
require_once("../database/connection.php");
session_start();
if(isset($_SESSION['uname'])||isset($_SESSION['upass'])){
   header("location:dashboard.php");
}else{
    if(isset($_REQUEST['login'])){
        if(($_REQUEST['username']=="")||($_REQUEST['password']=="")){
            $err= "Please Fill All The Fields";
        }else{
            $uname=$_REQUEST['username'];
            $upass=($_REQUEST['password']);
            $sql="SELECT id,uname,upass,urole FROM users";
            $res=$conn->prepare($sql);
            $res->bind_result($id,$name,$pass,$urole);
            $res->execute();
            while($res->fetch()){
            if(($uname==$name) and  (password_verify($upass,$pass))){
                $_SESSION['uname']=$uname;
                $_SESSION['upass']=$upass;
                $_SESSION['urole']=$urole;
                $_SESSION['uid']=$id;
                header("location:dashboard.php");
                return;
            }else{
                $err="Wrong Username or Password";
            }
        }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogCMS</title>

    <!-- Bootstarp CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- FontAwesome CSS  -->
    <link rel="stylesheet" href="../css/all.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin.css">

</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="lform">
                <div class="loginf">
                    <h1 class="text-center" >Login</h1>
                    <div class="lsubmit">
                        <form action="" method="POST">
                            <label for="username">UserName:</label><br>
                            <input type="text" name="username" id="username" autocomplete="off" autofocus="on" required><br><br>
                            <label for="password" >Password:</label><br>
                            <input type="password" name="password" id="password" autocomplete="off" required><br><br>
                            <input type="submit" class="btn-sm btn-success" name="login" value="Login"></input>
                        </form>
                    </div>
                    <p>Forgot Password <a href="#"> click here</a></p>
                    <span><?php if(isset($err)){echo "<div class='bg-danger text-white' style='width:100%; height:30px; text-align:center; margin-top:10px;' > $err </div>";} ?></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Pooper Js  -->
    <script src="../javascript/popper.min.js"></script>
    <!-- Bootstarp JS  -->
    <script src="../javascript/bootstrap.min.js"></script>
    <!-- FontAwesome Js  -->
    <script src="../javascript/all.js"></script>
</body>
</html>
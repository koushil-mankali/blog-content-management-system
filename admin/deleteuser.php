<?php
require_once('../database/connection.php');
if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $sql="DELETE FROM users WHERE id=$id";
    $res=$conn->prepare($sql);
    $res->execute();
    header("location:users.php");
}else{
    header("location:../error.php");
}

?>
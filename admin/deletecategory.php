<?php
require_once('../database/connection.php');
if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $sql="DELETE FROM category WHERE category_id=$id";
    $res=$conn->prepare($sql);
    $res->execute();
    header("location:category.php");
}else{
    header("location:../error.php");
}

?>
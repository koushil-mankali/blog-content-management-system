<?php
require_once('../database/connection.php');
if(isset($_REQUEST['pid'])){
    $id=$_REQUEST['pid'];
    $ctid=$_REQUEST['ctid'];
    $pauthor=$_REQUEST['paut'];
    $pimg=$_REQUEST['pimg'];
    if(isset($id) && isset($ctid) && isset($pimg)){
        unlink("images/".$pimg);
        $sqlp="UPDATE category SET category_posts=category_posts - 1 WHERE category_id=$ctid";
        $resp=$conn->prepare($sqlp);
        $resp->execute();
        $sqlu="UPDATE users SET u_posts=u_posts - 1 WHERE id=$pauthor";
        $resu=$conn->prepare($sqlu);
        $resu->execute();
        $sql="DELETE FROM posts WHERE post_id=$id";
        $res=$conn->prepare($sql);
        $res->execute();
    }
    header("location:posts.php");
}else{
    header("location:../error.php");
}

?>
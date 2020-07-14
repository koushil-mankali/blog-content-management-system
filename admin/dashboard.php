<?php
require_once('../database/connection.php');
//-===== posts count ======-
$sql="SELECT post_id,post_name FROM posts";
$res=$conn->prepare($sql);
$res->bind_result($pid,$pname);
$res->execute();
$res->store_result();
$pcnt=$res->num_rows();
//-===== category count ======-

$sql1="SELECT category_id FROM category";
$res1=$conn->prepare($sql1);
$res1->bind_result($cid);
$res1->execute();
$res1->store_result();
$ccnt=$res1->num_rows();  

//-===== users count ======-

$sql2="SELECT id FROM users";
$res2=$conn->prepare($sql2);
$res2->bind_result($uid);
$res2->execute();
$res2->store_result();
$ucnt=$res2->num_rows();

//-===== Latest Articles ======-
$sql3="SELECT post_id,post_name FROM posts ORDER BY post_id DESC LIMIT 4";
$res3=$conn->prepare($sql3);
$res3->bind_result($pid3,$pname3);
$res3->execute();
$res3->store_result();
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
        <?php require_once('topheader.php'); ?>
        <div class="col-6 col-sm-6 col-md-3">
            <?php include_once('admin-sidebar.php'); ?>
        </div>         
        <div class="col-12 col-md-9">
            <div class="dframe">
                <div class="postframe">
                    <span id="pfheader"><h2>POSTS</h2></span>
                    <span id="count"><?php echo $pcnt; ?></span>
                    <span id="vbtn"><a href="../admin/posts.php">View</a></span>
                </div>
                <div class="postframe">
                    <span id="pfheader"><h2>CATEGORY</h2></span>
                    <span id="count"><?php echo $ccnt; ?></span>
                    <span id="vbtn"><a href="../admin/category.php">View</a></span>
                </div>
                <div class="postframe">
                    <span id="pfheader"><h2>USERS</h2></span>
                    <span id="count"><?php echo $ucnt; ?></span>
                    <span id="vbtn"><a href="../admin/users.php">View</a></span>
                </div>
            </div>
            <div class="dsec2">
                <div class="dcomments">
                    <h1>Comments</h1>
                    <span class="ucomment">
                        <span class="vimg">
                            <img src="../images/guest-user.jpg" alt="">
                        </span>
                        <span class="vcomment">
                            <h3>Visitor 1</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </span>
                    </span>
                    <span class="ucomment">
                        <span class="vimg">
                            <img src="../images/guest-user.jpg" alt="">
                        </span>
                        <span class="vcomment">
                            <h3>Visitor 2</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </span>
                    </span>
                    <span class="ucomment">
                        <span class="vimg">
                            <img src="../images/guest-user.jpg" alt="">
                        </span>
                        <span class="vcomment">
                            <h3>Visitor 3</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </span>
                    </span>
                    <span class="ucomment">
                        <span class="vimg">
                            <img src="../images/guest-user.jpg" alt="">
                        </span>
                        <span class="vcomment">
                            <h3>Visitor 4</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </span>
                    </span>
                </div>
                <div class="rside">
                    <h1>Latest Articles</h1>
                <?php if($res3->num_rows()>0){
                    while($res3->fetch()) { ?>
                        <div class="larticles">
                        <p> <?php echo $pname3; ?> </p>
                        </div>
                <?php } }else {echo "<div style='display:block; width:100%; font-weight:bold; font-size:2rem; text-align:center;'>0 Results Found</div>";} ?>
                </div>
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
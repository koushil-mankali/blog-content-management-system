<?php require_once('database/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogCMS</title>

    <!-- Bootstarp CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS  -->
    <link rel="stylesheet" href="css/all.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <?php include_once('header.php'); ?>
    
    <div class="container my-3">
        <div class="row">
            <div class="col-12 col-md-8 main">
            <?php 
                if(isset($_REQUEST['id'])){
                    $id= $_REQUEST['id'];
                }else{
                    header('location:error.php');
                }
                $sql="SELECT post_name,post_desc,post_date,post_img,ur.uname,ct.category_name FROM posts LEFT JOIN users ur ON posts.author=ur.id LEFT JOIN category ct ON posts.category=ct.category_id WHERE post_id=$id ";
                $res=$conn->prepare($sql);
                $res->bind_result($pname,$pdesc,$pdate,$pimg,$urname,$ctname);
                $res->execute();
                $res->store_result();
                if($res->num_rows()>0){
                    $res->fetch();
            ?>
            <div class="article">
                <div class="ptitle">
                    <h1><?php echo $pname; ?></h1>
                    <div class="postdet">
                        <span class="postdet1">
                            <i class="fas fa-tag fa-xs"></i>
                            <a href="#"><?php if(isset($ctname)){echo $ctname;}else{echo "Default";} ?></a>
                        </span>
                        <span class="postdet1">
                            <i class="fas fa-user fa-xs"></i>
                            <a><?php if(isset($urname)){echo $urname;}else{echo "koushil-A";} ?></a>
                        </span>
                        <span class="postdet1">
                            <i class="fas fa-calendar-alt fa-xs"></i>
                            <a><?php if(isset($pdate)){echo $pdate;} ?></a>
                        </span>
                    </div>
                </div>
                <div class="pimg">
                    <img src="<?php echo "admin/images/".$pimg; ?>" alt="">
                </div>
                <div class="p_desc">
                    <?php echo $pdesc; ?>
                </div>
            </div>
            <?php }else{ echo "Error"; } ?>
            </div>
            <?php include_once('sidebar.php'); ?>
        </div>
    </div>



    <?php include_once('footer.php'); ?>
    <!-- Pooper Js  -->
    <script src="javascript/popper.min.js"></script>
    <!-- Bootstarp JS  -->
    <script src="javascript/bootstrap.min.js"></script>
    <!-- FontAwesome Js  -->
    <script src="javascript/all.js"></script>
</body>
</html>
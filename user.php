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
            <!---------------- Post --------------------------- -->
            <?php 
                    if(isset($_REQUEST['pageid'])){
                        $catpage=$_REQUEST['pageid'];
                    }else{
                        header('location:error.php');
                    }
                    $limit=10;
                    if(isset($_REQUEST['page'])){
                        $pageno=$_REQUEST['page'];
                    }else{
                        $pageno=1;
                    }
                    $offsetl=($pageno-1)*$limit;
                    $sql="SELECT post_id,post_name,post_desc,post_date,post_img,ur.id,ur.uname,ct.category_id,ct.category_name FROM posts LEFT JOIN users ur ON posts.author=ur.id LEFT JOIN category ct ON posts.category=ct.category_id WHERE id=$catpage LIMIT $offsetl,$limit";
                    $res=$conn->prepare($sql);
                    $res->bind_result($pid,$pname,$pdesc,$pdate,$pimg,$uid,$urname,$ctid,$ctname);
                    $res->execute();
                    $res->store_result();
                    if($res->num_rows()>0){
                        while($res->fetch()){
                ?>
                <div class="post">
                    <span class="postimg">
                           <img src="<?php if(isset($pimg)){echo "admin/images/".$pimg;} ?>"  onclick="location.href='article.php?id=<?php echo $pid ?>'" alt="">
                    </span>
                    <span class="postright">
                        <h2 ><a href="article.php?id=<?php echo $pid ?>"><?php if(isset($pname)){echo $pname;} ?></a></h2>
                        <div class="postdet">
                            <span class="postdet1">
                                <i class="fas fa-tag fa-xs"></i>
                                <a href="category.php?pageid=<?php echo $ctid ?>"><?php if(isset($ctname)){echo $ctname;}else{echo "Default";} ?></a>
                            </span>
                            <span class="postdet1">
                                <i class="fas fa-user fa-xs"></i>
                                <a href="user.php?pageid=<?php echo $uid ?>"><?php if(isset($urname)){echo $urname;}else{echo "koushil-A";} ?></a>
                            </span>
                            <span class="postdet1">
                                <i class="fas fa-calendar-alt fa-xs"></i>
                                <a><?php if(isset($pdate)){echo $pdate;} ?></a>
                            </span>
                        </div>
                        <p class="postcontent"><?php if(isset($pdesc)){echo substr($pdesc,0,130)."...";} ?>
                        </p>
                        <div class="readmore">
                        <a href="article.php?id=<?php echo $pid; ?>" style="text-decoration:none;" class="btn-sm btn-primary">Read More...</a>
                        </div>
                    </span>
                </div>
                <div class="hr">
                    <hr>
                </div>
                <?php } } ?>
                <!---------------- Post End ------------------------------>  
                <!-- Pagination Code  -->
                <?php
                    $sqlpg="SELECT * FROM posts";
                    $respg=$conn->prepare($sqlpg);
                    $respg->execute();
                    $respg->store_result();
                    if($respg->num_rows()>0){
                        $ttlrecords=$respg->num_rows();
                        // $limit=10;
                        $ttlpages=ceil($ttlrecords/$limit);
                        echo '<ul class="pagination">';
                        if($pageno>1){
                            echo '<li class="paginationli prev"><a href="category.php?pageid='.$catpage.'&page='.($pageno-1).'">Prev</a></li>';
                        }else{
                            $pageno=1;
                            echo '<li class="paginationli prev"><a href="category.php?pageid='.$catpage.'&page='.($pageno).'">Prev</a></li>';
                        }
                        for($i=1;$i<=$ttlpages;$i++){
                            if($pageno==$i){
                                $pgactive="pgactive";
                            }
                            else{
                                $pgactive="";
                            }
                            echo '<li class="paginationli '.$pgactive.'"><a href="category.php?pageid='.$catpage.'&page='.$i.'">'.$i.'</a></li>';
                        }
                        if($pageno<$ttlpages){
                            echo '<li class="paginationli next"><a href="category.php?pageid='.$catpage.'&page='.($pageno+1).'">Next</a></li>';
                        }else{
                            $pageno=$ttlpages;
                            echo '<li class="paginationli prev"><a href="category.php?pageid='.$catpage.'&page='.($pageno).'">Next</a></li>';
                        }
                        echo '</ul>';
                    }
                ?>   
                <!-- Pagination Code END --> 
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
<?php
require_once('../database/connection.php');
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
        <div class="cont">
            <span><span id="crh1">Category</span><button type="button" onclick="location.href='settings.php'" class="btn btn-success float-right crbtn">Create</button></span>
            <?php
                     $limit=15;
                     if(isset($_REQUEST['page'])){
                         $pageno=$_REQUEST['page'];
                     }else{
                         $pageno=1;
                     }
                     $offsetl=($pageno-1)*$limit;
                    $sql="SELECT * FROM category LIMIT $offsetl,$limit";
                    $res=$conn->prepare($sql);
                    $res->bind_result($id,$name,$posts);
                    $res->execute();
                    $res->store_result();
                    if($res->num_rows()>0){
            ?>
            <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark ">
                        <tr class="text-center">
                            <th>S.NO</th>
                            <th>CATEGORY</th>
                            <th>POSTS</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($res->fetch()){ ?>
                        <tr class="text-center">
                            <td><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $posts; ?></td>
                            <td ><a href="settings.php?cid=<?php echo $id; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td><a href="deletecategory.php?id=<?php echo $id; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php }else{ echo "<div style='display:block; width:100%; font-weight:bold; font-size:2rem; text-align:center;'>0 Results Found</div>"; } ?>
            </div>
             <!-- Pagination Code  -->
             <?php      
                    $sqlpg="SELECT * FROM category";
                    $respg=$conn->prepare($sqlpg);
                    $respg->execute();
                    $respg->store_result();
                    if($respg->num_rows()>0){
                        $ttlrecords=$respg->num_rows();
                        if($ttlrecords>14){
                            $ttlpages=ceil($ttlrecords/$limit);
                            echo '<ul class="pagination">';
                            if($pageno>1){
                                echo '<li class="paginationli prev"><a href="category.php?page='.($pageno-1).'">Prev</a></li>';
                            }else{
                                $pageno=1;
                                echo '<li class="paginationli prev"><a href="category.php?page='.($pageno).'">Prev</a></li>';
                            }
                            for($i=1;$i<=$ttlpages;$i++){
                                if($pageno==$i){
                                    $pgactive="pgactive";
                                }
                                else{
                                    $pgactive="";
                                }
                                echo '<li class="paginationli '.$pgactive.'"><a href="category.php?page='.$i.'">'.$i.'</a></li>';
                            }
                            if($pageno<$ttlpages){
                                echo '<li class="paginationli next"><a href="category.php?page='.($pageno+1).'">Next</a></li>';
                            }else{
                                $pageno=$ttlpages;
                                echo '<li class="paginationli prev"><a href="category.php?page='.($pageno).'">Next</a></li>';
                            }
                            echo '</ul>';
                        }
                    }
                ?>   
                <!-- Pagination Code END -->
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
<?php require_once('../database/connection.php'); ?>
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
        <?php include_once('topheader.php'); ?>
        <div class="col-6 col-sm-6 col-md-3">
            <?php include_once('admin-sidebar.php'); ?>
        </div>         
        <div class="col-12 col-md-9">
        <?php
            if(isset($_REQUEST['publish'])){
                if(($_REQUEST['cheading']=="")||($_REQUEST['cdesc']=="")||($_REQUEST['crselect']=="")||(empty($_FILES['imgt']['name']))){
                    $repp =  "Please Fill All The Fields";
                }else{
                    if(($_FILES['imgt'])){                      
                        $errors=array();
                        $file_name=$_FILES['imgt']['name'];
                        $file_size=$_FILES['imgt']['size'];
                        $file_tmp=$_FILES['imgt']['tmp_name'];
                        $file_type=$_FILES['imgt']['type'];
                        $f=explode('.',$file_name);
                        $file_ext=end($f);
                        $extensions=array('jpeg','jpg','png');
                        $ufile_name=uniqid().$file_name;
                        if(in_array($file_ext,$extensions)===false){
                            $errors[]="This extenion file not allowed,Please choose a JPG , JPEG or png file format.";
                        }
                        if($file_size > 2097152){
                            $errors[]="File size must be less than 2mb";
                        }
                        if(empty($errors)==true){
                            move_uploaded_file($file_tmp,"images/".$ufile_name);
                        }else{
                            $ierr= $errors;
                            die();
                        }
                    }  
                    $sql="INSERT INTO posts(post_name,post_desc,category,author,post_img) VALUES(?,?,?,?,?)";
                    $res=$conn->prepare($sql);
                    $res->bind_param("ssiis",$ptitle,$pdesc,$pcat,$aid,$ufile_name);
                    $ptitle=mysqli_real_escape_string($conn,$_REQUEST['cheading']);
                    $pdesc=mysqli_real_escape_string($conn,$_REQUEST['cdesc']);
                    $pcat=mysqli_real_escape_string($conn,$_REQUEST['crselect']);
                    $aid=$_SESSION['uid'];
                    if($res->execute()){
                        $reps="Article Published Successfully";
                        $sqlp="UPDATE category SET category_posts=category_posts + 1 WHERE category_id=$pcat";
                        $resp=$conn->prepare($sqlp);
                        $resp->execute();
                        $sqlu="UPDATE users SET u_posts=u_posts + 1 WHERE id=$aid";
                        $resu=$conn->prepare($sqlu);
                        $resu->execute();
                    }else{
                        $repf="Unable to Publish Article..";
                    }
                }
            }
        ?>
        <?php
         if(isset($_REQUEST['pid'])){
            $mpid=$_REQUEST['pid'];
            $sqlm="SELECT post_id,post_name,post_desc,category,post_img FROM posts WHERE post_id=$mpid";
            $resm=$conn->prepare($sqlm);
            $resm->bind_result($upid,$upname,$updesc,$upcat,$upimg);
            $resm->execute();
            $resm->store_result();
            if($resm->num_rows()>0){
                $resm->fetch();
            }
        }
        if(isset($_REQUEST['update'])){
            if(($_REQUEST['cheading']=="")||($_REQUEST['cdesc']=="")||($_REQUEST['crselect']=="")){
                $repp =  "Please Fill All The Fields";
            }else{
                if(empty($_FILES['imgt']['name'])){
                    $oldimg=$_REQUEST['oldimg'];
                    $sqlup="UPDATE posts SET post_name=?,post_desc=?,category=?,post_img=? WHERE post_id=$upid";
                    $resup=$conn->prepare($sqlup);
                    $resup->bind_param("ssis",$ptitle,$pdesc,$pcat,$oldimg);
                    $ptitle=mysqli_real_escape_string($conn,$_REQUEST['cheading']);
                    $pdesc=mysqli_real_escape_string($conn,$_REQUEST['cdesc']);
                    $pcat=mysqli_real_escape_string($conn,$_REQUEST['crselect']);
                    if($resup->execute()){
                        $reps="Article Updated Successfully";
                        if($upcat==$pcat){

                        }else{
                            $sqlp="UPDATE category SET category_posts=category_posts + 1 WHERE category_id=$pcat";
                            $resp=$conn->prepare($sqlp);
                            $resp->execute();
                            $sqlp2="UPDATE category SET category_posts=category_posts - 1 WHERE category_id=$upcat";
                            $resp2=$conn->prepare($sqlp2);
                            $resp2->execute();
                        }
                    }else{
                        $repf="Unable to Update Article..";
                    }
                }else{
                    if(($_FILES['imgt'])){                      
                        $errors=array();
                        $file_name=$_FILES['imgt']['name'];
                        $file_size=$_FILES['imgt']['size'];
                        $file_tmp=$_FILES['imgt']['tmp_name'];
                        $file_type=$_FILES['imgt']['type'];
                        $f=explode('.',$file_name);
                        $file_ext=end($f);
                        $extensions=array('jpeg','jpg','png');
                        $ufile_name=uniqid().$file_name;
                        if(in_array($file_ext,$extensions)===false){
                            $errors[]="This extenion file not allowed,Please choose a JPG , JPEG or png file format.";
                        }
                        if($file_size > 2097152){
                            $errors[]="File size must be less than 2mb";
                        }
                        if(empty($errors)==true){
                            move_uploaded_file($file_tmp,"images/".$ufile_name);
                        }else{
                            $ierr= $errors;
                            die();
                        }
                    }
                    $sqlup="UPDATE posts SET post_name=?,post_desc=?,category=?,post_img=? WHERE post_id=$upid";
                    $resup=$conn->prepare($sqlup);
                    $resup->bind_param("ssis",$ptitle,$pdesc,$pcat,$ufile_name);
                    $ptitle=mysqli_real_escape_string($conn,$_REQUEST['cheading']);
                    $pdesc=mysqli_real_escape_string($conn,$_REQUEST['cdesc']);
                    $pcat=mysqli_real_escape_string($conn,$_REQUEST['crselect']);
                    if($resup->execute()){
                        $reps="Article Updated Successfully";
                        $oldimg=$_REQUEST['oldimg'];
                        unlink("images/".$oldimg);
                        if($upcat==$pcat){

                        }else{
                            $sqlp="UPDATE category SET category_posts=category_posts + 1 WHERE category_id=$pcat";
                            $resp=$conn->prepare($sqlp);
                            $resp->execute();
                            $sqlp2="UPDATE category SET category_posts=category_posts - 1 WHERE category_id=$upcat";
                            $resp2=$conn->prepare($sqlp2);
                            $resp2->execute();
                        }
                    }else{
                        $repf="Unable to Update Article..";
                    }
                    
                }
            }
        }  
        
        ?>
        <span><?php if(isset($reps)){echo "<div class='bg-success text-white' style='width:100%; height:30px; text-align:center; font-weight:bold;' > $reps </div>";} elseif(isset($repf)){echo "<div class='bg-danger text-white' style='width:100%; height:30px; text-align:center; font-weight:bold;'>$repf</div>";} elseif(isset($repp)){echo "<div class='bg-danger text-white' style='width:100%; height:30px; text-align:center; font-weight:bold;'>$repp</div>";} elseif(isset($ierr)){echo "<div class='bg-danger text-white' style='width:100%; height:30px; text-align:center; font-weight:bold;'>$ierr</div>";} else{} ?></span>
            <div class="cont">
                <form action="" method="POST" class="cform" enctype="multipart/form-data">
                    <span><span id="crh1">Add New Post</span><input type="submit" name="<?php if(isset($upid)){echo "update"; }else{echo "publish";} ?>" class="btn btn-success float-right" value="<?php if(isset($upid)){echo "Update"; }else{echo "Publish";} ?>"></input></span>
                    <input type="text" class="form-control" name="cheading" id="cheading" placeholder="Enter Article Title..." value="<?php if(isset($upname)){echo $upname;} ?>" autocomplete="off">
                    <br>
                    <textarea name="cdesc" id="cdesc"  placeholder="Write Article Here...."><?php if(isset($updesc)){echo $updesc;} ?></textarea>
                    <br>
                    <br>
                    <h3>Category</h3>
                    <select name="crselect" id="crselect">
                        <option >Select Category</option>
                        <?php
                            $sql="SELECT category_id,category_name FROM category";
                            $res=$conn->prepare($sql);
                            $res->bind_result($id,$name);
                            $res->execute();
                            $res->store_result();
                            if($res->num_rows()>0){
                                while($res->fetch()){?>
                                    <option value="<?php echo $id; ?>"<?php if(isset($upcat) && ($upcat==$id)){ echo "selected";}else{echo "";} ?> ><?php echo $name; ?></option>
                        <?php } }?>
                    </select>
                    <br>
                    <br><br>
                    <h3>Post Image</h3>
                    <input type="file" name="imgt" id="img" >
                    <input type="hidden" name="oldimg" value="<?php if(isset($upimg)){ echo $upimg;}?>">
                    <br>
                    <br>
                    <br>
                    <br>
                </form>
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
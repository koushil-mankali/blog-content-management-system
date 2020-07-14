<?php require_once('database/connection.php'); ?>
<div class="col-12 col-md-3 sidebar">
    <div class="sidebarinner">
        <p><i class="fa fa-thumbs-up"></i> Like Us on Facebook</p>
    </div>
    <!-- ==================== Post Start ====================== -->
    <div class="rposts">
    <h2 id="rh2">Recent Posts</h2>
    <?php 
        $sql="SELECT post_id,post_name,post_img,ur.id,ur.uname,ct.category_id,ct.category_name FROM posts LEFT JOIN users ur ON posts.author=ur.id LEFT JOIN category ct ON posts.category=ct.category_id ORDER BY post_id DESC LIMIT 5";
        $res=$conn->prepare($sql);
        $res->bind_result($pid,$pname,$pimg,$uid,$urname,$ctid,$ctname);
        $res->execute();
        $res->store_result();
        if($res->num_rows()>0){
            while($res->fetch()){
    ?>
        <div class="spost">
            <span class="spostimg">
                    <img src="<?php if(isset($pimg)){echo "admin/images/".$pimg;} ?>" onclick="location.href='article.php?id=<?php echo $pid ?>'" alt="">
            </span>
            <span class="spostright">
                <h2 ><a href="article.php?id=<?php echo $pid ?>" style="text-decoration:none; color:black;"><?php if(isset($pname)){echo $pname;} ?></a></h2>
                <div class="spostdet">
                    <span class="spostdet1">
                        <i class="fas fa-tag fa-xs"></i>
                        <a href="category.php?pageid=<?php echo $ctid ?>"><?php if(isset($ctname)){echo $ctname;}else{echo "Default";} ?></a>
                    </span>
                    <span class="spostdet1">
                        <i class="fas fa-user fa-xs"></i>
                        <a href="user.php?pageid=<?php echo $uid ?>"><?php if(isset($urname)){echo $urname;}else{echo "koushil-A";} ?></a>
                    </span>
                </div>
                <div class="sreadmore">
                    <a href="article.php?id=<?php echo $pid; ?>" style="text-decoration:none;" class="btn-sm btn-primary">Read More...</a>
                </div>
            </span>
        </div>
        <div class="hr">
            <hr>
        </div>

        <?php } } ?>
        <!-- ==================== Post Start ====================== -->
    </div>
</div>
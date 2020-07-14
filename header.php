<div class="container-fluid">
    <div class="row">
        <div class="col topheader">
            <span>
                <p><?php echo date("l jS F Y h:i:s A"); ?></p>
            </span>
            <span>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
            </span>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col header">
            <h2 onclick="location.href='index.php'" >BlogCMS</h2>
            <img src="admin/images/headerlogo.jpg" onclick="location.href='index.php'" class="bimg">
            <span>
                <form action="search.php" method="POST">
                    <input type="text" name="search" id="search" placeholder="Search..." autocomplete="off">
                    <input type="submit" name="searchsub" value="Search">
                </form>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="navbar">
            <?php
                    require_once('database/connection.php');
                    $sql="SELECT category_id,category_name FROM category";
                    $res=$conn->prepare($sql);
                    $res->bind_result($id,$catname);
                    $res->execute();
                    $res->store_result();
                    if($res->num_rows()>0){
            ?>
                <ul>
                    <li onclick="location.href='index.php'">Home</li>
                    <?php while($res->fetch()){ ?>
                    <li onclick="location.href='category.php?pageid=<?php echo $id; ?>'"><?php echo $catname; ?></li>
                    <?php }?>
                </ul>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
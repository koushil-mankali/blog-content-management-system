<div class="innera">
    <div class="blist">    
        <a href="../admin/dashboard.php">Dashboard</a><br>
        <a href="../admin/createpost.php">Create Post</a><br>
        <a href="../admin/posts.php">Posts</a><br>
        <a href="../admin/category.php">Category</a><br>
        <?php
            if(isset($_SESSION['urole'])){
                if($_SESSION['urole']==0){
                    echo '  <a href="../admin/users.php">Users</a><br>
                            <a href="../admin/settings.php">Settings</a><br>';
                }
            }
        ?>
    </div>
</div>


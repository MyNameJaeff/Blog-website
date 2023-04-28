<?php
include 'header.php';
include 'blogposter.php';
?>
<main>
    <?php
    if(isset($_COOKIE['user'])){
        echo "<a href='userpage.php'>User</a>";
    }
    ?>
    <div class="slideShow">
    <?php

    ?>
    </div>

    <div class="trendingBlogs">
    <?php

    ?>
    </div>

    <div class="someBlogs">
    <?php

    ?>
    </div>
</main>
<?php
if(isset($_POST["logout"])){
    unset($_COOKIE["user"]);
    setcookie('user', NULL);
}
include 'footer.php';
?>
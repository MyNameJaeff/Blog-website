<?php
include 'header.php';
include 'blogposter.php';
?>
<main>
    <a href="postBlog.php">Blog</a>
    <a href="allblogs.php">All blogs</a>
    <a href="loginpage.php">Login</a>
    <a href="registerpage.php">Register</a>
    <form method="post">
        <input type="submit" value="log out" name="logout">
    </form>
    <?php
    if(isset($_COOKIE['user'])){
        echo "<a href='userpage.php'>User</a>";
    }
    ?>
</main>
<?php
if(isset($_POST["logout"])){
    unset($_COOKIE["user"]);
    setcookie('user', NULL);
}
include 'footer.php';
?>
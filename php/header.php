<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <title>Blog website</title>
</head>
<body>
    <header class="d-flex justify-content-between align-items-center" style="border-bottom:1px solid black; padding:1px;">
        <div class="dropdown">
            <button onclick="popMenu()" class="btn dropbtn" style=""><img src="../images/menu.png" alt="huh" width="50" height="50" style="pointer-events:none;"></button>
            <div id="myDropdown" class="dropdown-content">
                <a href="postBlog.php">Blog</a>
                <a href="allblogs.php">All blogs</a>
                <?php
                if(isset($_COOKIE['user'])){
                    echo "<a href='userpage.php'>User page</a>";
                    echo('
                    <form method="post">
                        <input type="submit" value="Log out" name="logout" class="btn btn-outline-danger logoutbutton">
                    </form>');
                }else{
                    echo '<a href="loginpage.php">Login</a>';
                    echo '<a href="registerpage.php">Register</a>';
                }
                if(isset($_POST["logout"])){
                    unset($_COOKIE["user"]);
                    setcookie('user', NULL);
                    echo "<script>window.location.href='index.php';</script>";
                }
                ?>
            </div>
        </div>
        <a href="index.php"><img src="../images/huh.png" alt="huh" width="50" height="50"></a>
        <div class="search">
            <form method="POST">
                <input type="text" name="search" placeholder="Search...">
                <a href=""><img src="../images/searchglass.png" alt="huh" width="30" height="30"></a>
            </form>
        </div>
    </header>
    <script>
        function popMenu(){
            document.getElementById("myDropdown").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
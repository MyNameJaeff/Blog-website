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
    <header class="d-flex justify-content-between align-items-center" style="border-bottom:1px solid black; padding:1px; background-color:#fafafa;">
        <div class="dropdown">
            <button onclick="popMenu()" class="btn dropbtn" style=""><img src="../images/menu.png" alt="huh" width="50" height="50" style="pointer-events:none;"></button>
            <div id="myDropdown" class="dropdown-content" style="position:absolute; z-index:2;">
                <?php
                session_start();
                if($_SERVER['REQUEST_URI'] != "/phpstuff/blog-hemsidan/php/searchpage.php"){
                    unset($_SESSION['seachterm']);
                }
                if($_SERVER['REQUEST_URI'] != "/phpstuff/blog-hemsidan/php/userpage.php"){
                    unset($_SESSION['tempuser']);
                }
                if(isset($_SESSION['user'])){
                    echo '<a href="../php/postBlog.php">Blog</a>';
                }
                ?>
                <a href="../php/allblogs.php">All blogs</a>
                <?php
                if(isset($_SESSION['user'])){
                    echo "<a href='../php/userpage.php'>User page</a>";
                    echo('
                    <form method="post">
                        <input type="submit" value="Log out" name="logout" class="btn btn-outline-danger logoutbutton">
                    </form>');
                }else{
                    echo '<a href="../php/loginpage.php">Login</a>';
                    echo '<a href="../php/registerpage.php">Register</a>';
                }
                if(isset($_POST["logout"])){
                    unset($_SESSION["user"]);
                    echo "<script>window.location.href='../php/index.php';</script>";
                }
                ?>
            </div>
        </div>
        <a href="../php/index.php"><img src="../images/huh.png" alt="huh" width="50" height="50"></a>
        <div class="search">
            <form method="POST" class="d-flex">
                <input type="text" name="search" placeholder="Search... (specific)" required>
                <button type="submit" name="searchSubmit" style="padding: 0; border: none; background-color:unset;"><img src="../images/searchglass.png" width="35" height="35"/></button>
            </form>
            <?php
            if(isset($_POST['searchSubmit'])){
                $searchterm = $_POST['search'];
                $_SESSION['searchterm'] = $searchterm;
                echo "<script>window.location.href='../php/searchpage.php';</script>";
            }
            ?>
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
<?php include '../php/header.php'; include '../php/blogposter.php';?>
    <main class='ablogmain'>
    <div class='ablogdiv'><p class='titleofablog' name='blogtitlespecific'>This is a showcasae blog 2</p>
<form method='post' class='d-flex flex-column'>
                <input type='submit' value='test' name='userprfile' style='width:fit-content;'>
             </form>
<p class='textofablog'>    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<img src='../uploads/Rome-Food-Gelato.webp' alt='uploadedimage' width='200px' class='imageofablog'>
</div>
    </main>
    <?php if(isset($_POST["userprfile"])){
        unset($_SESSION["tempuser"]);
        $_SESSION["tempuser"] = $_POST["userprfile"];
    } 
    include "../php/footer.php"; ?>
<?php include '../php/header.php'; include '../php/blogposter.php';?>
    <main class='ablogmain'>
    <div class='ablogdiv'><p class='titleofablog' name='blogtitlespecific'>This is the title of a blog</p>
<form method='post' class='d-flex flex-column'>
                <input type='submit' value='Jeff' name='userprfile' style='width:fit-content;'>
             </form>
<p class='textofablog'>TextTextTextTextTextTextTextText</p>
<img src='../uploads/istockphoto-184103864-1024x1024.jpg' alt='uploadedimage' width='200px' class='imageofablog'>
</div>
    </main>
    <?php if(isset($_POST["userprfile"])){
        unset($_SESSION["tempuser"]);
        $_SESSION["tempuser"] = $_POST["userprfile"];
        echo "<script>window.location.href='../php/userpage.php';</script>";
    } 
    include "../php/footer.php"; ?>
<?php include '../php/header.php'; include '../php/blogposter.php';?>
    <main class='ablogmain'>
    <div class='ablogdiv'><p class='titleofablog' name='blogtitlespecific'>Title</p>
<form method='post' class='d-flex flex-column'>
                <input type='submit' value='Username' name='userprfile' style='width:fit-content;'>
             </form>
<p class='textofablog'>Graj</p>
<img src='../uploads/anonymous-mask-png-5a3a7b1e820029.70240918151378204653256794.jpg' alt='uploadedimage' width='200px' class='imageofablog'>
</div>
    </main>
    <?php if(isset($_POST["userprfile"])){
        unset($_SESSION["tempuser"]);
        $_SESSION["tempuser"] = $_POST["userprfile"];
        echo "<script>window.location.href='../php/userpage.php';</script>";
    } 
    include "../php/footer.php"; ?>
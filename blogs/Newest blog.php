<?php include '../php/header.php'; include '../php/blogposter.php';?>
    <main class='ablogmain'>
    <div class='ablogdiv' style="width:100px;">
        <form method="post" class="d-flex flex-column">
            <input type="text" class='titleofablog' name="blogtitlespecific" value="Newest blog" style="background-color:white;border:none;">
            <input type="submit" value="user1" name="userprfile">
        </form>
        <p class='textofablog'>Newest blog</p>
        <img src='../uploads/final_6356de0aa372fa119872c7d5_873187.png' alt='uploadedimage' width='200px' class='imageofablog'>
    </div>
    </main>
    <?php 
    if(isset($_POST['userprfile'])){
        $_SESSION['tempuser'] = $_POST['blogtitlespecific'];
    }
    include "../php/footer.php"; ?>
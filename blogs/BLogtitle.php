<?php include '../php/header.php'; include '../php/blogposter.php';?>
    <main class='ablogmain'>
        <div class='ablogdiv'><p class='titleofablog' name='blogtitlespecific'>BLogtitle</p>
            <form method='post' class='d-flex flex-column'>
                <input type='submit' value='username1' name='userprfile' style='width:fit-content;'>
            </form>
            <p class='textofablog'>DSadsadsadsad</p>
            <img src='../uploads/clouds-mf.jpg' alt='uploadedimage' width='200px' class='imageofablog'>
        </div>
    </main>
    <?php if(isset($_POST["userprfile"])){
        unset($_SESSION["tempuser"]);
        $_SESSION["tempuser"] = $_POST["userprfile"];
        echo "<script>window.location.href='../php/userpage.php';</script>";
    } 
    include "../php/footer.php"; ?>
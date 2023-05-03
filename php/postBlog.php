<?php
include 'header.php';
include 'blogposter.php';
if(!isset($_SESSION['user'])){
    echo "<script>window.location.href='loginpage.php';</script>";
}
if(isset($_POST['submitBlog'])){
    $conn = new mysqli($servername, $username, $password, $dbname);
    $author = $_SESSION["user"];   
    $blogtitle = $_POST['blogTitle'];
    $blogdescription = $_POST['blogDesc'];
    $blogtext = $_POST['blogText'];
    $images = $_FILES['file']['name'];
    if($images == ""){
        $images = "backupimage.png";
    };
    $sql = "INSERT INTO `blogposts`(`author`, `blogtitle`, `blogdescription`, `blogtext`, `images`)
                        VALUES ('$author', '$blogtitle', '$blogdescription', '$blogtext', '../uploads/$images')";
    $blogfile = fopen("../blogs/$blogtitle.php", "w") or die("Unable to create blog");
    $txt = 
    "<?php include '../php/header.php'; include '../php/blogposter.php';?>
    <main>
    <div>";
    $txt .= "<h1 class='titleofablog'>$blogtitle</h1>\n";
    $txt .= "<h3 class='authorofablog'>$author</h3>\n";
    $txt .= "<p class='textofablog'>$blogtext</p>\n";
    $txt .= "<img src='../uploads/$images' alt='uploadedimage' width='200px' class='imageofablog'>\n";
    $txt .=
    "</div>
    </main>
    <?php include '../php/footer.php'; ?>";
    fwrite($blogfile, $txt);
    fclose($blogfile);
    $result = $conn->query($sql);
    if($result != TRUE){
        echo("Error:".$sql."<br>".$conn->error);
    }
    $conn->close();
}
?>
<main class="bd-main order-1">
    <div class="blogPostBox" style="width:40%">
        <form method="POST" enctype="multipart/form-data" style="width:100%">
            <div class="">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Title:</span><br>
                    <input type="text" class="form-control" name="blogTitle" id="blogTitle" placeholder="Title? (special)" required><br>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Description:</span><br>
                    <input type="text" class="form-control" name="blogDesc" id="blogDesc" placeholder="Description" required><br>
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-text">Text:</span><br>
                <textarea style="width:500px;" class="form-control" type="text" name="blogText" id="blogText" placeholder="Context of your blog" required></textarea><br>
            </div><br>
            <div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="file" id="inputGroupFile02 file">
                </div>
                <br>
                <input type="submit" class="btn btn-outline-primary" name="submitBlog" value="Submit">
            </div>
        </form>
        <form method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Title:</span><br>
                <input type="text" class="form-control" name="blogTitle" id="blogTitle" placeholder="Title? (special)" required><br>
                <input type="submit" class="btn btn-outline-primary" name="checker" value="Submit">
            </div>
        </form>
        <?php
        if(isset($_POST['checker'])){
            echo("AMONG");
        }
        ?>
    </div>
</main>
<?php
if(isset($_POST['submitBlog'])){
    $fileName = $_FILES['file']['name'];  
    $temp_name = $_FILES['file']['tmp_name'];
    $location = '../uploads/';
    move_uploaded_file($temp_name, $location.$fileName);
}
include 'footer.php';
?>
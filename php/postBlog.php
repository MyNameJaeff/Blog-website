<?php
include 'header.php';
include 'blogposter.php';
if(!isset($_COOKIE['user'])){
    echo "<script>window.location.href='loginpage.php';</script>";
}
if(isset($_POST['submitBlog'])){
    $conn = new mysqli($servername, $username, $password, $dbname);
    $author = $_COOKIE["user"];   
    $blogtitle = $_POST['blogTitle'];
    $blogdescription = $_POST['blogDesc'];
    $blogtext = $_POST['blogText'];
    $images = $_FILES['file']['name'];
    $sql = "INSERT INTO `blogposts`(`author`, `blogtitle`, `blogdescription`, `blogtext`, `images`)
                        VALUES ('$author', '$blogtitle','$blogdescription', '$blogtext', '../uploads/$images')";
    $blogfile = fopen("../blogs/$blogtitle.php", "w") or die("Unable to create blog");
    $txt = 
    "<?php include '../php/header.php'; ?>
    <main>
    <div>
    <a href='../php/index.php'>Go back</a>
    </div>
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
<main>
    <div class="blogPostBox">
        <form method="POST" enctype="multipart/form-data">
            <div class="">
                <label for="blogTitle">Blog title:</label><br>
                <input type="text" name="blogTitle" id="blogTitle" placeholder="What's the title of your blog? (special)" required><br>
                <label for="blogDesc">Blog description:</label><br>
                <input type="text" name="blogDesc" id="blogDesc" placeholder="Describe your blog" required><br>
            </div>
            <label for="blogText">Text:</label><br>
            <input type="text" name="blogText" id="blogText" placeholder="Context of your blog" required><br>
            <div>
                <label for="image">Image:</label><br>
                <input type="file" name="file" id="file"><br>
                <br>
                <input type="submit" name="submitBlog" value="Submit">
            </div>
        </form>
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
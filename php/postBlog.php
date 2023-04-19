<?php
include 'header.php';
include 'blogposter.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['submitBlog'])){
    $author = $_POST['author'];
    $blogtitle = $_POST['blogTitle'];
    $blogdescription = $_POST['blogDesc'];
    $blogtext = $_POST['blogText'];
    $images = $_FILES['file']['name'];
    $sql = "INSERT INTO `blogpostings`(`author`, `blogtitle`, `blogdescription`, `blogtext`, `images`)
                        VALUES ('$author', '$blogtitle','$blogdescription', '$blogtext', '../uploads/$images')";
    $result = $conn->query($sql);
    if($result == TRUE){
        echo("New record created succesfully");
    }else{
        echo("Error:".$sql."<br>".$conn->error);
    }
    $conn->close();
}
?>
<div class="blogPostBox">
    <form method="POST" enctype="multipart/form-data">
        <div class="">
            <label for="author">Author:</label><br>
            <input type="text" name="author" id="author"><br>
            <label for="blogTitle">Blog title:</label><br>
            <input type="text" name="blogTitle" id="blogTitle"><br>
            <label for="blogDesc">Blog description:</label><br>
            <input type="text" name="blogDesc" id="blogDesc"><br>
        </div>
        <label for="blogText">Text:</label><br>
        <input type="text" name="blogText" id="blogText"><br>
        <div>
            <label for="image">Image:</label><br>
            <input type="file" name="file" id="file">
            <input type="submit" name="submitBlog" value="Submit">
        </div>
    </form>
</div>
<?php
if(isset($_POST['submitBlog'])){
    $fileName = $_FILES['file']['name'];  
    $temp_name = $_FILES['file']['tmp_name'];
    $location = '../uploads/';
    move_uploaded_file($temp_name, $location.$fileName);
}
include 'footer.php';
?>
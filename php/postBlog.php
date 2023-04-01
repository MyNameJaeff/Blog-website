<?php
include 'header.php';
?>
<div class="blogPostBox">
    <form method="POST">
        <div class="">
            <label for="author">Author:</label><br>
            <input type="text" name="author" id="author"><br>
            <label for="blogDesc">Blog description:</label><br>
            <input type="text" name="blogDesc" id="blogDesc"><br>
        </div>
        <label for="blogText">Text:</label><br>
        <input type="text" name="blogText" id="blogText"><br>
        <div>
            <label for="image">Image:</label><br>
            <input type="file" name="image" id="image">
            <input type="submit" name="submitBlog" value="Submit">
        </div>
    </form>
</div>
<?php
include 'footer.php';
?>
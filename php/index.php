<?php
include 'header.php';
?>
<main>
    <a href="postBlog.php">Blog</a>
    <a href="allblogs.php">All blogs</a>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

    <div id="id01" class="modal">
    
    <form class="modal-content animate" action="/action_page.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="../images/huh.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" class="logininput" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" class="logininput" placeholder="Enter Password" name="psw" required>
            
        <button type="submit" class="loginbutton">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
    </div>

    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</main>
<?php
include 'footer.php';
?>
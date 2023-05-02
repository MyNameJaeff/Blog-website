<?php
include "header.php";
include "blogposter.php";
?>
<main>
    <?php
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM logins";
    $result = $conn->query($sql);    
    if($result->num_rows > 0){
        echo '
        <form method="post">
        <div>
            <label for="usernameoremail">Username or Email</label><br>
            <input type="text" name="usernameoremail" required>
        </div>
        <div>
            <label for="password">Password</label><br>
            <input type="password" name="password" required>
        </div><br>
        <input type="submit" value="Login" name="login">
        </form>';
    }else{
        echo "<p>There are no registered users. Please register here: <a href='registerpage.php' style='color:blue;'>Register</a></p>";
    }
    $conn->close();
    ?>
</main>
<?php
if(isset($_POST["login"])){
    $userinfo = $_POST["usernameoremail"];
    $password = $_POST["password"];
    $conn = new mysqli($servername, "root", "", $dbname);

    $sql = "SELECT * FROM logins WHERE email='$userinfo' OR username='$userinfo' AND passwrd='$password'";
    $results = mysqli_query($conn, $sql);
    if(!empty(mysqli_num_rows($results))){
        setcookie("user", $userinfo);
        echo "<script>window.location.href='userpage.php';</script>";
    }else{
        echo("Wrong");
    }
}
include "footer.php";
?>
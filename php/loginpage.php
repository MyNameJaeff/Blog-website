<?php
include "header.php";
include "blogposter.php";
?>
<main>
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
    </form>
</main>
<?php
if(isset($_POST["login"])){
    $userinfo = $_POST["usernameoremail"];
    $password = $_POST["password"];
    $conn = new mysqli($servername, "root", "", $dbname);

    $sql = "SELECT * FROM logins WHERE email='$userinfo' OR username='$userinfo' AND passwrd='$password'";
    $results = mysqli_query($conn, $sql);
    if(!empty(mysqli_num_rows($results))){
        echo("Success");
        setcookie("user", $userinfo);
    }else{
        echo("Wrong");
    }
}
include "footer.php";
?>
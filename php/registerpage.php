<?php
include "header.php";
include "blogposter.php";
?>
<main>
    <form method="post" enctype="multipart/form-data">
        <div>
            <label for="username">Username</label><br>
            <input type="text" class="username" name="username" required>
        </div>
        <div>
            <label for="email">Email</label><br>
            <input type="email" class="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label><br>
            <input type="password" class="password" name="password" required><br>
            <label for="repeatpassword">Repeat the password</label><br>
            <input type="password" class="password" name="repeatpassword" required>
        </div>
        <div>
            <label for="profilepic">Profile picture</label><br>
            <input type="file" class="profilepic" name="profilepic" accept="image/png, image/jpeg">
        </div><br>
        <input type="submit" value="Register" name="register">
    </form>
</main>
<?php

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];
    $profilepic = $_FILES['profilepic']['name'];
    $conn = new mysqli($servername, "root", "", $dbname);
    
    $sql = "SELECT * FROM logins WHERE email='$email'";
    $results = mysqli_query($conn, $sql);
    if(empty(mysqli_num_rows($results))){
        if($password == $repeatpassword){
            $sql = "INSERT INTO `logins`(`username`, `email`, `passwrd`, `profilepicture`)
                                VALUES ('$username', '$email','$password', '../uploads/$profilepic')";
            $result = $conn->query($sql);
            if($result == TRUE){
                echo("New record created succesfully");
                $temp_name = $_FILES['profilepic']['tmp_name'];
                $location = '../uploads/';
                move_uploaded_file($temp_name, $location.$profilepic);
                $_SESSION["user"] = $username;
                header("userpage.php");
            }else{
                echo("Error:".$sql."<br>".$conn->error);
            }
        }
        else{
            echo("Passwords do not match");
        }
    }
    else{
        echo("email is already registered");
    }
    $conn->close();
}
include "footer.php";

?>
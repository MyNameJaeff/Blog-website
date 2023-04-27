<?php
include "header.php";
include 'blogposter.php';     
?>

<?php
if(isset($_COOKIE['user'])){
    $user = $_COOKIE['user'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM logins WHERE username='$user'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo($row['username']."<br>");
            echo("<img src='".$row['profilepicture']."'>");
        }
    }
    echo "<div width='100%'; background-color:blue;>";
    $sql = "SELECT * FROM blogposts WHERE author='$user'";
    $result = $conn->query($sql);
    $table = "<div class='allposts d-flex'>";

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $table .= "<a href='../blogs/".$row["blogtitle"].".php' color='black'><div>" . "<img src='" .
            $row["images"] . "' alt='uploadedImage' width='50' height='50'><h3>" .
            $row["author"] . "</h3>" . "<h2>" .
            $row["blogtitle"] . "</h2><p>" . 
            $row["blogdescription"] . "</p></div><br></a>";
        }
    }else{
        echo "0 results";
    }
    $table .= "</div>";
    echo $table;
    $conn->close();

}
?>

<?php
include "footer.php";
?>
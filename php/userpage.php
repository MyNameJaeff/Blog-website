<?php
include "header.php";
include 'blogposter.php';     
?>

<?php
$statement1 = isset($_SESSION['user']);
$statement2 = isset($_SESSION['tempuser']);
if($statement1 OR $statement2){
    if($statement1){
        $user = $_SESSION['user'];
    }else{
        $user = $_SESSION['tempuser'];
    }
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM logins WHERE username='$user'";
    $result = $conn->query($sql);
    echo "<div class='d-flex align-items-center userprofilepagetop'>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo("<img src='".$row['profilepicture']."' class='userprofilepic' width='200px'>");
            echo("<p class='usersusername'>".$row['username']."</p>");
        }
    }
    echo "</div>";
    echo "<hr style='border: 3px solid black'>";
    echo("<div class='container containerallposts'>");
    echo "<h4 style='text-decoration:underline;'>All of $user's blogs: </h4>";
    $sql = "SELECT * FROM blogposts WHERE author='$user'";
    $result = $conn->query($sql);
    $table = "<div class='allposts d-flex row row-cols-4'>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $table .= "<a href='../blogs/".$row["blogtitle"].".php' color='black' style='border:1px solid black; border-radius:2%; padding:1%; background-color:#fafafa;'><div class='col'>" . "<img src='" .
            $row["images"] . "' alt='uploadedImage' width='100' height='100'><h5>" .
            $row["author"] . "</h5>" . "<h4>" .
            $row["blogtitle"] . "</h4><p>" . 
            $row["blogdescription"] . "</p></div><br></a>";
        }
    }else{
        echo "0 results";
    }
    $table .= "</div>";
    echo $table;
    echo "</div>";
    $conn->close();

}
?>

<?php
include "footer.php";
?>
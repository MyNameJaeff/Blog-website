<?php
include 'header.php';
include 'blogposter.php';     
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT author, blogtitle, blogdescription, blogtext, images FROM blogposts";
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

include 'footer.php';
?>
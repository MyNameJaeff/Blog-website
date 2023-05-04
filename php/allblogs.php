<main>
<?php
include 'header.php';
include 'blogposter.php';     
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT author, blogtitle, blogdescription, blogtext, images FROM blogposts";
$result = $conn->query($sql);

echo("<div class='container containerallposts'>");
$table = "<div class='allposts d-flex row row-cols-5'>";

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $table .= "<a href='../blogs/".$row["blogtitle"].".php' color='black' style='border:1px solid black; border-radius:2%; padding:1%; background-color:#fafafa;'><div class='col'>" . "<div style='width:100%; height:60%;'><img src='" .
        $row["images"] . "' alt='uploadedImage' width='100%' height='100%'></div><p style='margin-bottom:2px;'>" .
        $row["author"] . "</p>" . "<h4>" .
        $row["blogtitle"] . "</h4><p style='font-size:0.9em;'>" . 
        $row["blogdescription"] . "</p></div><br></a>";
    }
}else{
    echo "0 results";
}
$table .= "</div>";
echo $table;
echo("</div>");
$conn->close();
?>
</main>
<?php
include 'footer.php';
?>
<?php
include 'header.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogpostings";      
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT author, blogtitle, blogdescription, blogtext, images FROM blogpostings";
$result = $conn->query($sql);

$table = '<table class="table table-striped table-hover">';
      $table .= "<tr>
                <td> Author </td>
                <td> Blog title </td>
                <td> Blog description </td>
                <td> Blog text </td>
                <td> Image </td>
                </tr>";

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $table .= "<tr><td>" . 
        $row["author"] . "</td><td>" . 
        $row["blogtitle"] . "</td><td>" . 
        $row["blogdescription"] . "</td><td>" .
        $row["blogtext"] . "</td><td class='imageBox'>" . "<img src='" . 
        $row["images"] . "' alt='uploadedImage' width='50' height='50'>" . "</td></tr>";
    }
}else{
    echo "0 results";
}
$table .= "</table>";
echo $table;
$conn->close();

include 'footer.php';
?>
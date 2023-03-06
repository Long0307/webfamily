<?php 

$conn = mysqli_connect('localhost:3306', 'root', '', 'nhphuz8a_webfamily');


$sql = 'SELECT * FROM mega_menu';


$result = mysqli_query($conn, $sql);


$rows = array();


while ($row = mysqli_fetch_assoc($result)){

    $rows[] = $row;

}

echo json_encode($rows);

?>
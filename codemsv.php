<?php
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "nhphuz8a_webfamily";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		echo "Connected successfully"."<br>";

		$sql = "SELECT * FROM san_pham";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["ID"]."<br>";
    $i = $row["ID"];
    if((strlen($row["ID"]) > 0) && (strlen($row["ID"]) < 2)){

    		$msp = "SP000000".$i;

    		$sql = "UPDATE san_pham SET MaSanPham = '".$msp."' WHERE ID = ".$row["ID"];

			if ($conn->query($sql) === TRUE) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . $conn->error;
			}
    	
    }else if(strlen($row["ID"]) == 2){

    		$msp = "SP00000".$i;

    		$sql = "UPDATE san_pham SET MaSanPham = '".$msp."' WHERE ID = ".$row["ID"];

			if ($conn->query($sql) === TRUE) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . $conn->error;
    		}
    }else if(strlen($row["ID"]) == 3){

    		$msp = "SP0000".$i;

    		$sql = "UPDATE san_pham SET MaSanPham = '".$msp."' WHERE ID = ".$row["ID"];

			if ($conn->query($sql) === TRUE) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . $conn->error;
    	}
    }else{

    		$msp = "SP000".$i;

    		$sql = "UPDATE san_pham SET MaSanPham = '".$msp."' WHERE ID = ".$row["ID"];

			if ($conn->query($sql) === TRUE) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . $conn->error;
    	
    		}
  		}
  	}
} else {
  echo "0 results";
}
		
		
?>
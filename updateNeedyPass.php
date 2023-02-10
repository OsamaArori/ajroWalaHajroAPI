<?php
// array for JSON response
$response = array();

$Id=$_POST['Id'];
$Pass= $_POST['Pass'];

 

$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "projectdb";

$response['dishs'] = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//echo "Connected successfully";

 // by hazem ahmad

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "update needy set password='$Pass' where id='$Id'";

if ($conn->query($sql) === TRUE ) {
        $UserId = $conn->insert_id;
 
        $response['dishs'] = array();
		$hobbie['Pass'] = $Pass;
        $hobbie['status'] = " ok";
        $hobbie['result'] = "successfull";
 
        // push single dishinto final response array
        array_push($response['dishs'],$hobbie);
        // echoing JSON response
        echo json_encode($response);
        
         // by hazem ahmad
} else {
   // echo "Error: " . $sql . "" . $conn->error;
        $response['dishs'] = array();
        // failed to insert row
     //   $hobbie['Id'] = "0";
        $hobbie['status'] = "no";
        $hobbie['result'] = "Error: " . $sql . "" . $conn->error;
        array_push($response['dishs'],$hobbie);
        // echo no users JSON
        echo json_encode($response);
    
}

$conn->close();
 



 
?>
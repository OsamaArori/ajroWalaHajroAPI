<?php



$response = array();


$ID= $_POST['ID'];
$Type=$_POST['Type'];


  
$response = array();
 
 
 // by hazem ahmad

$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "projectdb";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 // by hazem ahmad  and id='$Id'

$sql = "SELECT * FROM history where usertype='$Type' and userid='$ID'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

$response['dishs'] = array();
 while($row = mysqli_fetch_assoc($result)) {
        // temp user array
       
        $dish= array();
		//$hobbie['Id'] = $row['id'];
		$hobbie['DonorID'] = $row['donorid'];
        $hobbie['Title'] = $row['info'];
		//$hobbie['Description'] = $row['description'];
		$hobbie['Pic'] = $row['pic'];
		//$hobbie['Status'] = $row['status'];
		$hobbie['Date'] = $row['date'];
		$hobbie['Address'] = $row['address'];
        //$hobbie['status'] = $Id;
        $hobbie['result'] = "find some Information";
        // push single dishinto final response array
        array_push($response['dishs'],$hobbie);
    }
    // success
   // $response["success"] = 1;
 
    // echoing JSON response
   echo json_encode($response);
   
} else {
	
	
   
	$response['dishs'] = array();
        // failed to insert row
		$hobbie['DonorID'] = "No Data";
        $hobbie['Title'] = "No Data";
        //$hobbie['Description'] = "No Data";
		$hobbie['Pic'] = "No Data";
		$hobbie['Address'] = "No Data";
		$hobbie['Date'] = "No Data";
        //$hobbie['status'] = $Id;
        $hobbie['result'] = "No Information Was found";
        array_push($response['dishs'],$hobbie);
        // echo no users JSON
        echo json_encode($response);
   
}

 // by hazem ahmad


?>
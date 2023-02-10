<?php



$response = array();


$ID=$_POST['ID'];
$Type= "1";
//$_POST['Type'];



  
$response = array();
 
 
 // by hazem ahmad

 $servername = "localhost";
 $username = "root";
 $password = "123456789";
 $dbname = "projectdb";
//$servername = "localhost";
//$username = "id17831820_root";
//$password = "kBMdJNh)*(!9gR5U";
//$dbname = "id17831820_awh";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 // by hazem ahmad  and id='$Id'

$sql = "SELECT * FROM notifications where needyid='$ID' and usertype='$Type'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

$response['dishs'] = array();
 while($row = mysqli_fetch_assoc($result)) {
        // temp user array
       
        $dish= array();
		$hobbie['NotfID'] = $row['id'];
		//$hobbie['Type'] = $row['usertype'];
		$hobbie['FromId'] = $row['donorid'];
		$hobbie['Name'] = $row['name'];
		$hobbie['Title'] = $row['title'];
		$hobbie['Descriptions'] = $row['descriptions'];
		$hobbie['Pic'] = $row['pic'];
		$hobbie['Date'] = $row['date'];
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
		$hobbie['NotfID'] = "No Data";
        $hobbie['Type'] = "No Data";
        $hobbie['ID'] = "No Data";
		$hobbie['Name'] = "No Data";
		$hobbie['Title'] = "No Data";
		$hobbie['Pic'] ="No Data";
        $hobbie['Descriptions'] = "No Data";
        $hobbie['Date'] = "No Data";
        array_push($response['dishs'],$hobbie);
        // echo no users JSON
        echo json_encode($response);
   
}

 // by hazem ahmad


?>
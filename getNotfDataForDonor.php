<?php



$response = array();


$NotfId= $_POST['NotfId'];
$UserID= $_POST['UserID'];
$Type= $_POST['Type'];


  
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
$sql = "SELECT * from notifications,needy where notifications.id='$NotfId' and needy.id='$UserID'";
 /* if($Type="1"){
	$sql = "SELECT * from notifications,donors where notifications.id='$NotfId' and donors.id='$UserID'";
	
}else if($Type="2"){
	$sql = "SELECT * from notifications,needy where notifications.id='$NotfId' and needy.id='$UserID'";
	
} 
 */

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

$response['dishs'] = array();
 while($row = mysqli_fetch_assoc($result)) {
        // temp user array
       
        $dish= array();
		$hobbie['Id'] = $row['id'];
        $hobbie['Name'] = $row['username'];
		$hobbie['Phone'] = $row['phone'];
		$hobbie['Address'] = $row['address'];
		$hobbie['Desc'] = $row['descriptions'];
		$hobbie['Date'] = $row['date'];
		$hobbie['Pic'] = $row['pic'];
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
		$hobbie['Name'] = "No Data";
        $hobbie['Email'] = "No Data";
        $hobbie['Phone'] = "No Data";
		$hobbie['Address'] = "No Data";
        $hobbie['Pass'] = "No Data";
		$hobbie['Pic'] = $row['pic'];
        //$hobbie['status'] = $Id;
        $hobbie['result'] = "No Information Was found";
        array_push($response['dishs'],$hobbie);
        // echo no users JSON
        echo json_encode($response);
   
}

 // by hazem ahmad


?>
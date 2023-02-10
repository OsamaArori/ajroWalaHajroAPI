<?php
// array for JSON response
$response = array();
$Type=$_POST['Type'];
$Id=$_POST['Id'];
$Title= $_POST['title'];
$Info= $_POST['Info'];
$Phone = $_POST['Phone'];
$Address = $_POST['Address'];
$Date = $_POST['Date'];
$Pic= $_POST['Pic'];
$DonateState= "1";
$Kind= $_POST['Kind'];

//$target_dir = "uploads/";
//$Pic= $_POST["Pic"];
//$target_dir=$target_dir."/".rand()."_".time()."jpeg";
 //if(file_put_contents($target_dir,base64_decode($Pic))){
	// echo json_encode(["message"=>"file uploaded","stats"=>"ok"]);
// }else{
//	 echo json_encode(["message"=>"error","stats"=>"error"]);
// }
 // by hazem ahmad
 

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

$sql = "insert into donations (donorid,title , description ,pic ,status , date ,address,kind)
	           VALUES('$Id','$Title' ,'$Info','$Pic','$DonateState','$Date','$Address','$Kind')";
if ($conn->query($sql) === TRUE ) {
        $UserId = $conn->insert_id;
 
        $response['dishs'] = array();
        $hobbie['Id'] = $Id;
		$hobbie['Info'] = $Info;
		$hobbie['Phone'] = $Phone;
		$hobbie['Address'] = $Address;
		$hobbie['Pic'] = $Pic;
		$hobbie['DonateState'] = $DonateState;
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
///////////////////////////////
//$sql1 = "insert into notifications (donorid , info ,phone ,address , pic ,donatestate,kind)
	//           VALUES('$Id' ,'$Info','$Phone','$Address','$Pic','$DonateState','$Kind')";

$conn->close();
 



 
?>
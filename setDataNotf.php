<?php
// array for JSON response
$response = array();
$Type=$_POST['Type'];
$DID=$_POST['DID'];
$NID=$_POST['NID'];
$DNID= $_POST['DNID'];
$Name= $_POST['Name'];
$Title = $_POST['Title'];;
$Descriptions = $_POST['Descriptions'];
$Date = $_POST['Date'];
$Pic= $_POST['Pic'];

 

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

$sql = "insert into notifications (usertype,donorid,needyid , dnid ,name ,title , descriptions ,pic,date)
	           VALUES('$Type','$DID','$NID' ,'$DNID','$Name','$Title','$Descriptions','$Pic','$Date')";
if ($conn->query($sql) === TRUE ) {
        $UserId = $conn->insert_id;
        $response['dishs'] = array();
        $hobbie['DID'] = $DID;
		$hobbie['NID'] = $NID;
		$hobbie['DNID'] = $DNID;
		$hobbie['Name'] = $Name;
		$hobbie['Title'] = $Title;
		$hobbie['Descriptions'] = $Descriptions;
		$hobbie['Pic'] = $Pic;
		$hobbie['Date'] = $Date;
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
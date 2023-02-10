<?php
// array for JSON response
$response = array();


$Name= $_POST['Name'];
$Email= $_POST['Email'];
$Phone = $_POST['Phone'];
$Address= $_POST['Address'];
$Pass= $_POST['Pass'];
$Pic= $_POST['Pic'];

  
$response = array();
 
 
$target_dir = "uploads/";
$Pic= $_POST["Pic"];
$target_dir=$target_dir."/".rand()."_".time()."jpeg";
 if(file_put_contents($target_dir,base64_decode($Pic))){
	 echo json_encode(["message"=>"file uploaded","stats"=>"ok"]);
 }else{
	 echo json_encode(["message"=>"error","stats"=>"error"]);
 }
 // by hazem ahmad
 

$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "projectdb";



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

$sql = "INSERT INTO donors(username , email ,phone ,address , password ,pic)
	          VALUES('$Name' ,'$Email','$Phone','$Address','$Pass','$Pic')";

if ($conn->query($sql) === TRUE ) {
        $UserId = $conn->insert_id;
 
        $response['dishs'] = array();
//        $hobbie['Id'] = $UserId;
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
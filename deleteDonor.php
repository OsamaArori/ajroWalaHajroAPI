<?php
$Id=$_POST['Id'];
$Type=$_POST['Type'];
$serverName="localhost";
$userName="root";
$password="123456789";
$dbName="projectdb";
$con=new mysqli($serverName,$userName,$password,$dbName);
if($con->connect_error){
        die ("not connect :(" .$connect -> connect_error);
		echo"data 0";
}
else{
	$sql="delete from donors where id='$Id'";
	if($con->multi_query($sql)==true){
	}else{
	echo "ERROR ".$sql.$con->error;
}
}
?>
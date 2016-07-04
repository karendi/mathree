<?php
header("Content-type:text/xml");

require("getlocation2.php") ;

//connection to the database
$conn = mysqli_connect('localhost' ,$username,$password,$database);
if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
} 



if(isset($_POST['submit'])){
	
	$sacco=($_POST['sacconame']);
	
	$xml='<?xml version="1.0" encoding="UTF-8"?>';
	
	$stmt=$conn->prepare("SELECT  `name`, `lat`, `lng` FROM `markers` WHERE `name`=?");
	$stmt->bind_param('s',$sacco);
    $stmt->execute();
	$results= $stmt->get_result();
	
    $xml.='<Directions>';
 	while($row = $results->fetch_array(MYSQLI_ASSOC)){
		
           $xml.='<sacco><name>'.$row['name'].'</name><latitude>'.$row['lat'].'</latitude><longitude>'.$row['lng'].'</longitude></sacco>';
		  
		   
	}
	$xml.='</Directions>';
		echo $xml;

          
	
	
	
	
	
}




?>
<?php
$conn=new mysqli('localhost', 'root', '', 'mathree');
if(!$conn)
{
	die("Connection Failed;" .mysqli_connect_error() );
}
if(!isset($_POST['update']))
{
	$clocation=($_POST['location']);
	$destination=($_POST['destination']);
	
	$query="SELECT  `Sacco` ,`Price` FROM `prices` WHERE `Current_Location` like ? AND `Destination` like ? " ;
	$stmt=$conn->prepare($query);
    $stmt->bind_param('ss', $clocation ,$destination);
	$stmt->execute();
    $stmt->bind_result($sacco,$price);
			  
		 while($stmt->fetch())
			   {
				   
				 printf("%s%s\n", $sacco,$price); 
				 
			   }
			   
       $stmt->close();
	   
			   
			  
		  
}

$conn->close();



?>
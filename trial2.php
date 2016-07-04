<?php
$server= 'localhost';
$username= 'root';
$password= '';
$database= 'project';
$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
}

if(isset($_POST["loc"]) && ($_POST["dest"]))
{
	$start = ($_POST["loc"]);
	$stop = ($_POST["dest"]);
	
	 $stmt1= $conn->prepare("SELECT  c.Name, d.Latitude, d.Longitude
	        FROM maintable a
			INNER JOIN pricesindex b ON b.RouteID = a.RouteID
			INNER JOIN saccos c ON c.Sacco_ID = b.Sacco_ID
			INNER JOIN markers d ON d.Sacco_ID = d.Sacco_ID
			 WHERE a.Location= ? AND a.Destination= ?");
			 if(!$stmt1)
			 {
				 $error3 = "Error..Prepare failed: (" . $conn->errno . ") " . $conn->error;
        				 echo $error3;
				 
				 
			 }
			 else
			 {
				$stmt1->bind_param('ss', $start,$stop);
				$stmt1->execute();
				if(!$stmt1)
				{
					$error4 = "Error..Sorry something went wrong while executing your query";
					echo $error4;
					
					
				}else
				{
					$results = $stmt1->get_result();
				 
				  $info = array();
					while($row = $results->fetch_array(MYSQLI_ASSOC) )
					{ 
				  
				       
					  
					   $data = array(
					  
					   'Sacco'=>$row['Name'], 
					   'Latitude'=>$row['Latitude'],
					   'Longitude'=>$row['Longitude']
					      );
					   $info[] = $data;
						
						
					}
					echo json_encode($info);
				 
				 
				 
			  }
	
	
}
}
else
{
	echo "Sorry something went wrong";
	
	
}












?>
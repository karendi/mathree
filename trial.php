<?php
$server= 'localhost';
$username= 'root';
$password= '';
$database= 'project';
$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
}
if(isset($_POST["loc"]) && ($_POST["dest"]) && ($_POST["time"]))
{
	$start = ($_POST["loc"]);
	$stop = ($_POST["dest"]);
	$ttravel = ($_POST["time"]);
	if(!preg_match("/^[a-zA-Z]*$/" , $start))
		 
	 {
		 $error1 = "Error:..Only enter alphabets.Thank-you";
		 echo ($error1);
		 
		 
	 }  
	 else if(!preg_match("/^[a-zA-Z]*$/" , $stop))
	 {
		 $error2 = "Error:..Only enter alphabets.Thank-you";
		 echo ($error2);
		 
		 
	 }
	 else{
		 if($ttravel == "Morning_Price")
		 {
			 $stmt1= $conn->prepare("SELECT a.Destination, a.Location, b.Name, c.TOV, d.Morning, e.Latitude, e.Longitude
			 FROM maintable a
			 INNER JOIN pricesindex f ON f.RouteID = a.RouteID
			 INNER JOIN prices d ON d.PriceID = f.PriceID
			 INNER JOIN saccos b ON b.Sacco_ID = f.Sacco_ID
			 INNER JOIN vehicles c ON c.vehicleID = d.vehicleID
			 INNER JOIN markers e ON e.Sacco_ID = b.Sacco_ID
			 WHERE a.Location= ? AND a.Destination= ?");
			 if(!$stmt1)
			 {
				 $error3 = "Error..Prepare failed: (" . $conn->errno . ") " . $conn->error;
        				 echo $error3;
				 
				 
			 }else
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
					if(($results->num_rows) == 0)
					{
				    $error5 = "Error..Sorry that route isn't available.We are working round the clock to bring it to you";	
					echo $error5;	
						
					}
					else
					{
					 $info = array();
					while($row = $results->fetch_array(MYSQLI_ASSOC) )
					{ 
				  
				       
					  
					   $data = array(
					   'Location' => $row['Location'], 
					   'Destination' => $row['Destination'],
					   'Morning_Price' => $row['Morning'],
					   'Sacco'=>$row['Name'],
					   'Vehicle'=>$row['TOV'], 
					   'Latitude'=>$row['Latitude'],
					   'Longitude'=>$row['Longitude']
					  );
					$info[] = $data;
						
						
						
					}
					echo json_encode($info);
				
					
					
				    
					
				
						
					}
					
					
					
				}
				
				 
				 
				 
				 
			 }
			 
			 
			 
			
			 
			 
			 
		 }
		 else if($ttravel == "Afternoon_Price")
		 {
			 echo "Afternoon";
		 } 
		 else if($ttravel == "Evening_price")
		 {
			 echo "Evening";
		 }
		 
		 
		 
		 
		 
		 
		 
	 }
	

	
	
}else
{
	
	
	echo "sorry something went wrong";
	
}


















?>


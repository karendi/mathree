<?php
require("getlocation2.php");
$start = $_POST['s'];
$stop = $_POST['stop'];
 
if(isset($_POST["loc"]) && ($_POST["dest"])){
 
//var_dump($_POST)
	
$stmt=$conn->prepare(' SELECT a.Location , a.Destination , b.prices , c.Sacco_Name , d.lat , d.lng
FROM maintable a
INNER JOIN prices b ON a.price_ID=b.price_ID 
INNER JOIN saccos c ON c.Sacco_ID=a.Sacco_ID
INNER JOIN markers d ON c.Sacco_ID=d.Sacco_ID
WHERE a.Location = ? AND a.Destination = ? 
ORDER BY b.prices ASC ');

			
$stmt->bind_param('ss',$start, $stop);

	
if($stmt->execute()) 
{		
header("Content-type: text/xml");
$xml='<?xml version="1.0" encoding="UTF-8"?>';

           $result= $stmt->get_result();
		    
		   if($result->num_rows ==0)
			   
		   {
			   $xml2.='<results>';
 
 
                  $xml2.= '<Marker>'."Sorry the route from $Location to $Destination is not available.We are working around the clock to bring them to you.".'</marker>';
   
			   $xml2.='</results>';
			   
			   echo $xml2;
		   } 
		   else 
		   {
		 $xml2.= '<results>';  
	while($row = $result->fetch_array(MYSQLI_ASSOC)) 
	{
		
		$xml2.='<Marker><Location>'.$row['Location'].'</Location><Destination>'.$row['Destination'].'</Destination><Price>'.$row['prices'].'</Price><Sacco>'.$row['Sacco_Name'].'</Sacco><Latitude>'.$row['lat'].'</Latitude><Longitude>'.$row['lng'].'</Longitude></Marker>';
	   }
		  $xml2.='</results>';
		  

		  echo $xml2 ;
		

		   }
 	 	
			
}


 else 
 {	error_log ("There was a problem executing the query");
		

 }

			
				
}	


?>


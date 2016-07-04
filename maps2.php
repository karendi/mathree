<?php

require("getlocation2.php");

if(isset($_POST["loc"]) && ($_POST["dest"])){
	  $start= ($_POST["loc"]);
	  $stop = ($_POST["dest"]);
	  
	  $stmt=$conn->prepare("SELECT a.Location , a.Destination , b.prices , c.Sacco_name , d.lat ,d.lng
FROM maintable a
INNER JOIN prices b ON b.price_ID = a.price_ID
INNER JOIN saccos c ON c.Sacco_ID = a.Sacco_ID
INNER JOIN markers d ON d.Sacco_ID = c.Sacco_ID
WHERE a.Location = ? AND a.Destination = ?" );

if(!$stmt)
    {
	
	
	 echo "Couldn't prepare statement";
	
     }
     else
	 {
      $stmt->bind_param('ss', $start, $stop);
	  $stmt->execute();
if(!$stmt){
	
	echo "OOOOPS";
	
	
       }
	   else
	   {	  
	  
	  $results = $stmt->get_result();
	  header('Content-type:application/json');
	   while($row = $results->fetch_array(MYSQLI_ASSOC))
	   {
		   
	    $out = json_encode($row);
		   
	   } 
	   echo $out;
	  
	 }
	 }
	  
	
	

	
	
}
else
{
	echo "Something went wrong.Please contact us and tell us about your problem.Reference it as Error R.";
	
	
}







?>
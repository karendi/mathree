<?php
require("getlocation2.php");
  if(isset($_POST["loc"]) && ($_POST["dest"]))
  {
	$start= ($_POST["loc"]);
    $stop = ($_POST["dest"]);
/*var_dump($start);
var_dump($stop)	;*/
	 /*echo is_array($start) ? 'Array' : 'not an Array';
echo "\n";
     echo is_array($stop) ? 'Array' : 'not an Array';
echo "\n";*/
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
		/*echo is_array($start) ? 'Array' : 'not an Array';
echo "\n";
     echo is_array($stop) ? 'Array' : 'not an Array';
echo "\n"; */
      
	
		$stmt = $conn->prepare("SELECT a.Location , a.Destination , b.prices , c.Sacco_name , d.lat ,d.lng
FROM maintable a
INNER JOIN prices b ON b.price_ID = a.price_ID
INNER JOIN saccos c ON c.Sacco_ID = a.Sacco_ID
INNER JOIN markers d ON d.Sacco_ID = c.Sacco_ID
WHERE a.Location = ? AND a.Destination = ?");
         $stmt->bind_param('ss', $start,$stop);
         $stmt->execute();
		if(!($stmt->execute())){
			$error3 = ('Error: execute() failed: ' . htmlspecialchars($stmt->error));
			echo ($error3);
			
		}
		
		else  
		{  
		    
				 $results = $stmt->get_result();
				 if(($results->num_rows)== 0)
				 {
					 $error4 = "Error:..We are sorry we don't have that route.We are working round the clock to bring it to you";
					echo ($error4);
					}
					else
					{
				 
		
			while($row = $results->fetch_array(MYSQLI_ASSOC) )
			{
			
		       
			   $output2 = json_encode($row);
				
		     }
			 echo $output2;
               
			   
			  
			 }
			
		          }}



		  
	 
	  
  
  

  }

?>

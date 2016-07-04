<?php
$server= 'localhost';
$username= 'root';
$password= '';
$database= 'project';
$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
} 

if (isset($_POST['phpdata']))
{
	      $data = array($_POST['phpdata']);
		  //var_dump($data);
	      $in = join(',', array_fill(0, count($data),'?'));//array_fill(start,the range-here the range is the count of number of values found in the array,mixed value) and join is supposed to separate the values

	      $stmt = $conn->prepare("SELECT a.Name, b.Latitude, b.Longitude 
		   FROM saccos a
		   INNER JOIN markers b ON b.Sacco_ID = a.Sacco_ID
		    WHERE a.Name IN ($in) ");
		if(!$stmt)
			 {
				 $error3 = "Error..Prepare failed: (" . $conn->errno . ") " . $conn->error;
        				 echo $error3;
				 
				 
			 }
		else
		{
			$stmt->bind_param(str_repeat('s',count($data)),...$data);//str_repeat needs two parameters.
			
			$stmt ->execute();
		
			
		}
  
  $info  = array();
$result = $stmt->get_result();
if(($result->num_rows)== 0)
	
				{
					$error4 = "Error..Sorry something went wrong while executing your query";
					echo $error4;
					
					
				}
				else
				{
					 $output = array() ;
					 while($row = $result->fetch_array(MYSQLI_ASSOC))
					 {
					    
					
				        $info =(array(
					   'Sacco'=>$row['Name'],
	                   'Latitude'=>$row['Latitude'],
					   'Longitude'=>$row['Longitude']));
					   $output[] = $info;
					  
					 }
					 
					
					
				    echo json_encode($output);
			
			
				}
				







}
else
{
	echo "something went wrong";
}










?>
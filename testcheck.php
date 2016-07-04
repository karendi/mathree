<?php
header('Content-Type:text/xml');
//generating xml content
echo '<?xml version="1.0" encoding= "UTF-8" standalone= "yes"?>';
//make xml element
echo '<response>';
$conn=new mysqli('localhost', 'root', '', 'mathree');
if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
}
if (!isset($_POST['submit']))
{
    $sstage_id= $_POST["Stage_ID"];
	$ssacco= $_POST["sacco"];
	$scurrent_location= $_POST["current_location"];
	$sdestination= $_POST["destination"];
	$sprice= $_POST["price"];
	$stime= $_POST["time"];

     $stmt=$conn->prepare("SELECT * FROM `prices` WHERE `Stage_ID`=?");
	 $stmt->bind_param('i',$sstage_id);
	 $stmt->execute();
	 if(!$stmt->execute())
	 {
		 echo"selecting was not successful";
		 
	 }
	 else
	 {
	 $stmt->store_result();
	 $stmt->num_rows;
	 }
	    if($stmt->num_rows == 0)
	 {
		 $insert=$conn->prepare( 'INSERT INTO prices(`Stage_ID`, `Sacco`, `Price`, `Current_Location`, `Destination`, `Time`) VALUES (?,?,?,?,?,?)' );
		 $insert->bind_param('isisss',$sstage_id, $ssacco, $sprice, $scurrent_location, $sdestination, $stime );
		 $insert->execute();
		
		   if(!$insert->execute())
		   {
			 echo "There was a problem";
		   }
		   else
		   {
			   echo "The fare was updated";
		   }
	 }
		 
	 else{
		 $update=$conn->prepare('UPDATE prices SET `Sacco`=?,`Price`=?,`Current_Location`=?,`Destination`=?,`Time`=? WHERE `Stage_ID`=?' );
	     $update->bind_param('sisssi', $ssacco, $sprice, $scurrent_location, $sdestination, $stime, $sstage_id);
		 $update->execute();
	
		 if(!$update->execute())
		 {
			 echo "The fare was a problem updating the fare";
		 }
		 else
		 {
			 echo "There fare has been updated";
		 }

	}
		 
		 
   	 
}

	$conn->close();
	echo'</response>';
?>
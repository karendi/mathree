<?php
//var_dump($_POST);
$conn=new mysqli('localhost', 'root', '', 'project');
if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
}
$conn->set_charset("utf8");
if (!isset($_POST['submit']))
{
    $studentid= $_POST["Student_ID"];
	$fname= $_POST["fname"];
	$lname= $_POST["lname"];
	$number= $_POST["phone_number"];
	$location= $_POST["location"];
	$address= $_POST["address"];


     $stmt=$conn->prepare("SELECT * FROM `students` WHERE `Student_ID`=?");
	 $stmt->bind_param('i',$studentid);
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
		 $insert=$conn->prepare( "INSERT INTO students(`Student_ID`, `Firstname`, `Lastname`, `Phoneno`, `Location`, `StuAddress`) VALUES (?,?,?,?,?,?)" );
		 $insert->bind_param('isssss',$studentid, $fname, $lname, $number, $location, $address );
		 $insert->execute();
		
		   if(!$insert->execute())
		   {
			 echo "There was a problem";
		   }
		   else
		   {
			   echo "The student details were inserted";
		   }
	 }
		 
	 else{
		 $update=$conn->prepare("UPDATE prices SET `Firstname`=?,`Lastname`=?,`Phoneno`=?,`Location`=?,`StuAddress`=? WHERE `Student_ID`=?" );
	     $update->bind_param('sssssi', $fname, $lname, $number, $location, $address, $studentid);
		 $update->execute();
	
		 if(!$update->execute())
		 {
			 echo "The fare was a problem updating the student details";
		 }
		 else
		 {
			 echo "The student details have been updated";
		 }

	}
		 
		 
   	 
}

	$conn->close();
?>
<?php
session_start();
$conn=new mysqli('localhost', 'root', '', 'mathree');


if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
}

if(isset($_POST['btn-login'])){
	
		$usname=(($_POST['Username']));
        $pword=(md5($_POST['Password']));
			
		$query="SELECT *  FROM `users` WHERE `User_name`=? AND `Password`=? " ;
	    $stmt=$conn->prepare($query);
		$stmt->bind_param('ss',$usname,$pword);
		$stmt->execute();
		$stmt->bind_result($usname,$pword);
		$stmt->store_result();
		
		if($stmt->num_rows == 1){
			
			while($stmt->fetch())
			{$_SESSION['Logged']=1;
		     $_SESSION['username']=$usname;
			 
			 header("location: update5.html");
			 exit();
			 	
			}
		}
		else
		{
			echo "INVALID USERNAME AND PASSWORD Combination!";
			
		}
		$stmt->close();
	
}
else

	{
		
	}
$conn->close();
?>
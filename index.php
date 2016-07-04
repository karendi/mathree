<!DOCTYPE html>
<html>
<head> 
</head>

<body>
<?php
$location_error = "" ;
$destination_error = "" ;
if (isset($_POST['submit']))
{
	if(empty($_POST['Location']))
	{
		$location_error = "Your current location is required ";
		
	}else {
		$loc = ($_POST['Location']);
		
		if(!preg_match("/^[a-zA-Z]*$/",$loc))
		{
			$location_error = "Only letters and white spaces allowed";
				
		}
		
	}
	if(empty($_POST['Destination']))
	{
		$destination_error = "Your desired Location is required";
	}else 
	{
		$dest =($_POST['Destination']);
		
		if(!preg_match("/^[a-zA-Z]*$/", $dest))
		{
			$destination_error = "Only letter and white spaces are allowed";
			
		}
	}
	
	
	
	
}
<h1>Enter your Current Location and Destination here</h1>
<p><span class="error">* Required Field </span></p>
<form method ="POST" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > <br>
Your Location:<input type = "text" name = "Location" value="<?php echo htmlspecialchars($loc);?>">
<span class = "error">*<?php echo $location_error;?></span>
<br><br>
Desired Destination:<input type= "text" name= "Destination" value="<?php echo htmlspecialchars($dest);?>">
<span class ="error">*<?php echo $destination_error;?></span>
<br><br>

<input type="submit" name="submit" value="Submit"> 
<br><br>

</form>








?>






</body>
</html>
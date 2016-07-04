<?php
include "connection.php";
	 
            $current_location = $_POST['Current_Location'];
            $destination = $_POST['Destination'];
			$sacco = $_POST['Sacco'];
			$time = $_POST['Time'];
			$price = $_POST['Price'];
            
            if(mysql_query("UPDATE prices ". "SET Current_Location = $Current_Location . Sacco=$Sacco . Destination=$Destination . Time=$Time . Price=$Price ". 
               "WHERE Current_Location = $Current_location . Destination = $Destination . Time = $Time")) 
			   echo "The fare has been updated";
			   else echo "The was a problem";
      
       
            ?>
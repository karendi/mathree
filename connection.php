<?php
$conn=new mysqli("localhost", "root", "", "easymathree");
if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
}

?>
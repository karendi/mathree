<?php
//var_dump($_POST);
$server= 'localhost';
$username= 'root';
$password= '';
$database= 'easymathree';
$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
}
?>

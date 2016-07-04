<?php
$conn=mysqli_connect('localhost','root','','easymathree');
if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
}
$conn->set_charset("utf8");
if(!isset($_POST['submit']))
{
	$referencenumber=($_POST['referencenumber']);
	$price=($_POST['price']);
	

$stmt1=('SELECT `ref`, `Price` FROM `fareprices` WHERE `ref`=?');	
$select=$conn->prepare($stmt1);
$select->bind_param('i',$referencenumber);
$select->execute();
$select->store_result();
$status=$select->num_rows;

if($status  == 1){
	$update=$conn->prepare('UPDATE `fareprices` SET `Price`=? WHERE `ref`=?');
	$update->bind_param('ii' ,$price, $referencenumber);
	$update->execute();
if(!$update){
	echo "There was a problem updating the fares";
}else echo "The fare was updated successfully";

	$update->close();
	
}else
	echo "The fare you want to update is not in the database";
	

	
	
	
}
$conn->close();












?>
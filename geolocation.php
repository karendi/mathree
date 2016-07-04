<?xml
 version="1.0"
 encoding="utf-8"
 standalone="yes" 
<html>
<body>
<?php
  // Start XML file, create parent node
$doc = new DOMDocument('1.0', 'utf-8');
// for a nice output
$doc->formatOutput = true;
$node = $doc->createElement("markers");
// We insert the new element as root (child of the document)
$parnode = $doc->appendChild($node);

$username= 'root';
$password= '';
$database= 'easymathree';
$conn = mysqli_connect('localhost',$username,$password,$database);
if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
}else 
{
	echo"successfully connected to the database";
}


// Select all the rows in the markers table
if(isset($_POST['submit'])){
	
	$sacco=($_POST ['sacco']);
	
$query=$conn->prepare("SELECT name, address, lat, lng FROM markers WHERE name=?");
$query->bind_param('s',$sacco);
$query->execute();
$result=$query->get_result();

if (!$result) {
  die('Invalid query: ' . mysql_error());
}}
 else {
	echo"There was a problem getting the sacco";
	    }



// Iterate through the rows, adding XML nodes for each
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
  $node = $doc->createElement("marker");
  $newnode = $parnode->appendChild($node);

  $newnode->setAttribute("name", $row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  
}

echo $doc->saveXML() . "\n";

?>
</body>
</html>
?>
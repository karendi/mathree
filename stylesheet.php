<?php
$str = ($_GET['data2']);
$map ='
<html>
<input type="hidden" id="data" value=<?php echo $str;?>/>
<script src ="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
	var p = $("input#data").val();
	alert(p);
	
	
});





</script>










</html>
';
print $map;



?>
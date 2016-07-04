<script language="JavaScript" type="text/javascript">
function ajax_post(){
//create our XMLHttpRequestObject
var HR=new XMLHttpRequest();
//create some variable we need to send to our php file
var URL="ajaxphp.php";
var SCC=document.getElementById("Sacco").value;
var C_LOC=document.getElementById("Current_Location").value;
var DEST=document.getElementById("Destination").value;
var TME=document.getElementById("Time").value;
var PRC=document.getElementById("Price").value;

var Vars="Sacco="+SCC +"&Current_Location="+C_LOC +"&Destination="+DEST +"&Time="+TME +"&Price="+PRC;
HR.open("POST", URL, true);

//set content type header information for sending URL encoded variables in the request
HR.setRequestHeader("Content-type", "application/x-www-formURLencoded");

//Access the onreadystatechange event for the XMLHttpRequest

HR.onreadystatechange=function(){
if (HR.readyState == 4 && HR.status ==200)
{
var return_data = HR.responseText;
document.getElementById("status").innerHTML = return_data;
}

}
//Sending the data to the php now and wait for the response to update the status div
HR.send(Vars);
document.getElementById("status").innerHTML="Processing....";

}
</script>
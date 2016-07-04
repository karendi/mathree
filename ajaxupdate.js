<script language="JavaScript" type="text/javascript">
function process(){  
  if(window.ActiveXObject)
	 {
		 try{
			 xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		 }catch (e){
			 xmlHttp=false;
		 }else
			 
		 try{
			 xmlHttp= new XMLHttpRequest();
		 }catch(e){
			 xmlHttp=false;
		 }
	 }

     if(!xmlHttp)
		 {
		 alert ("sorry cannot create the object")
	 }else{
		 return xmlHttp;
	 }
	 
	    var url="testcheck.php";
		var stageID = encodeURIComponent(document.getElementById("Stage_ID").value);
		var sacco = encodeURIComponent(document.getElementById("sacco").value);
		var CurrentLocation = encodeURIComponent(document.getElementById("current_location").value);
		var Destination = encodeURIComponent(document.getElementById("destination").value);
		var Price = encodeURIComponent(document.getElementById("price").value);
		var time = encodeURIComponent(document.getElementById("time").value);
		var vars = "Stage_ID"+ stageID + "&Sacco" + sacco + "&Current_Location" + CurrentLocation + "&Destination" + Destination + "&Price" + price +"&Time" + time ;
		xmlHttp.open("POST",url,true);
		xmlHttp.setRequestHeaer("Content-type","application/x-www-form-urlencoded");
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200 ){
		var returndata = xmlHttp.responseText;
		document.getElementById("status").innerHTML = return_data;
		}
		xmlHttp.send(vars);
       document.getElementById("status").innerHTML = "processing..."
		
	}

	</script>



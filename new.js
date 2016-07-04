$(document).ready(function(){
	$(".error").hide();
	$("button").click(function(){ 
	var loc = $("#Location").val();
	var dest = $("#Destination").val();
		if ( loc == "")
		{
		  $("#Location_error").show();	
	    }
		else if (dest == "")
		{
			$("#Destination_error").show();
			
		}
		else 
		{
			
			 $.ajax({
				 type: "POST",
				 url: "fares.php",
				 data: {loc , dest},
				 success: function(answer,textStatus,jqXHR){
					 
					 drawTable(answer);
					 
					 
					 
				 },
				 
				 
				 
				 
				 error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
				 
				 
				 
				 
				 
				 
			 });
			 function drawTable(answer){
				 
				 
				 
			 }
			
			
			
			
		}
		
		
		
		
		
		
		
		
	});
	
	
	
	
	
	
	
	
	
	
});
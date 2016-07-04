$("button#btn-login").click(function(){
	if ($("#username").val() == "" || $("#password").val() == "")
		$("div#ajax").html("Please enter your Username and Password");
	else 
		$.post("#login-form").attr("action"),
	    $("#login-form : input").serializeArray(),
		(function(data){
			$("div#ajax").html(data);
		}
	);
	$("#login-form").submit (function(){
		return false;
		
	}
	);
	
	
	
});
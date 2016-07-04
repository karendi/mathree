//when you want an element to fadeout 
$("#idoftheelement").fadeout(1000)//1000 being the time that will take or wait for the element to fade out
//when targeting a given class we need to get it this way:
$('.button').someaction //the class here is button or any other class you desire
//link connects html and css while script links jquery and html
$(document).ready(function(){
	
	$('div').mouseenter(function(){
		
		$('div').fadeTo('fast',1.0);//0.5 is the opacity
		
		
		
		
		
		
		
	});
	
	
	$('div').mouseleave(function(){
		
		$('div').fadeTo('fast', 0.5);
		
		
		
		
	});
	
	
	
	
	
	
	
	
	
});
$(document//its a function on its own and turns the document into a jquery object)
//function is made up of three parts:
//the function keyword
//inputs that the function takes
$(document).ready(function(input1,input2,input3//in jquery a function can take its input as another function){
	
	//actions to be taken
	//fadeIn
	..... $(document).ready(function(){
		
		$('div').fadeIn('fast');
		//when you want to do actions on two elements
		$('div, po').fadeTo('slow',0);//compound selector
		
		
		
		
		
	});
	this //keyword refers to the jquery object you are currently working with
	//append. it sets the specified element as the last child
	//prepend sets the object as the first child of the specified element
	
});

  $(document).ready(function(){
                    $("#button").click(function(){
 
                          var Location = $("#Location").val();
                          var Destination=$("#Destination").val();
 
                          $.ajax({
                              type:"post",
                              url:"searchthreetables.php",
                              data: {Dest: 'Destination', Loc: 'Location' },
							  dataType: "xml",
                              success:function(data){
                               $(data).find('Marker').each(function(){
							   
							  var info='<li>Your_Location:'+$(this).find('Location').text()+'</li><li>Your_Destination:'+$(this).find('Destination').text()+'</li><li>Estimated_Price:'+$(this).find('Price').text()+'</li><li>Sacco_Name:'+$(this).find('Sacco').text()+'</li><li>The_Latitude:'+$(this).find('Latitude').text()+'</li><li>The_Longitude:'+$(this).find('Longitude').text()+'</li>';
							   $("#content").append(info);
							   });
                              }
 
                          });
 
                    });
               });

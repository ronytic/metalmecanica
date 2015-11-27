$(document).ready(function(){
	$("#usuario").focus();
	$("#login").submit(function(event){
		if($("#usuario").val()=="")
		{
			$("#usuario").focus();
			event.preventDefault();	
		}else if($("#pass").val()==""){
			$("#pass").focus();
			event.preventDefault();	
		}else{
			
		}
		
	});
});
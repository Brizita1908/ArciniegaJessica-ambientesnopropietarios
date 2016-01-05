$(document).ready(function(){

	$(".num").hover(function(){
		$('#msg').text('El mouse esta sobre el cuadro');
	}, function(){
		$('#msg').text('El mouse no esta sobre el cuadro');
	});

 	
 	$("input").focus(function(){
        	$(this).css("background-color", "yellow");
    	});
    	$("input").blur(function(){
        	$(this).css("background-color", "#ffffff");
    	});
});
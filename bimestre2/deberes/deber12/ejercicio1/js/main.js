$(document).ready(function(){

	$('#btn-ocultar').on('click', function(event){
		event.preventDefault();

		if($('#info').css('display')!='none'){
			$('#info').fadeOut();
			$("#btn-ocultar").html('Mostrar info');
		}else{
			$('#info').fadeIn();
			$("#btn-ocultar").html('Ocultar info');
		}
		
	});

	$('#btn-oc').on('click', function(event){
		event.preventDefault();

		if($('#btn-oc').css('display')!='none'){
			$('#btn-oc').fadeOut();
		}
		
	});

	$('#btn-parr').on('click', function(event){
		event.preventDefault();

		if($('.intro').css('display')!='none'){
			$('.intro').fadeOut();
			$("#btn-parr").html('Mostrar parrafo');
		}else{
			$('.intro').fadeIn();
			$("#btn-parr").html('Ocultar parrafo');
		}
		
	});

	
	$('#elem1').on('click', function(event){
		event.preventDefault();

		if($('#elem1').css('display')!='none'){
			$('#elem1').fadeOut();
		}
		
	});

	$('#elem2').on('click', function(event){
		event.preventDefault();

		if($('#elem2').css('display')!='none'){
			$('#elem2').fadeOut();
		}
		
	});
});
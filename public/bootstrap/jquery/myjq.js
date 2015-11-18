$(function()
{		

	/*	$('html').addClass('js');

		$(".thumbnail").on('click','img',function()
		{			
			 $(this).parent().find( "input" ).click();
		});
		
		 $("#main input").on('change', function () 
		 {
			 var x = $(this).closest('.thumbnail');
			 $('#submit').removeAttr('disabled');
			  $('#submit').addClass('btn-success');
			x.addClass('send');
			 
		 });
		 
	
		
	$('textarea').on('input', function() {
				 var x = $(this).closest('.container').find('button');
				x.removeAttr('disabled');
				x.addClass('btn-success');
		});
		
		 
		 $(".container").on('click','#submit',function()
		{		
			$('.send').find( "button" ).click();
		});
		
		$('[data-toggle="tooltip"]').tooltip();
		
		$(".container").on('click','.edit',function()
		{		
			$(this).closest( "tr" ).find('.hide-input').toggle();
			$(this).siblings( "strong" ).toggle();
			
			
		});  */
		
	//	console.log('sex');


$(".container").on('click','button',function()
		{		
			$('.load').css({
							'display':'block'
							});		
		});  

var stop = 0;			
	
$(window).scroll(function()
{
	var wScroll = $(this).scrollTop();
	

	
	//console.log( 'scroll top :'+wScroll );
	//console.log( 'windows height:'+ $(window).height() );
	

	
	// pokazuje pozycje danego elementu//
	if( (wScroll + 1600) >= $(window).height() )
	{
		console.log('start');
		var i = 0;

		if(stop < 1)
		{
				$.post('../app/controllers/ajax.php',function(data)
				{
					
					//console.log(data);
					$(data).appendTo('.main');

				});
				stop++;
		}




		// znajduje kazdy element danej klasy a function(i) nadaje kazdemu lementowi numer//
		$('div .row .col-md-4 img').each(function(i)
		{
		
			setTimeout(function()
			{
				$('div .row .col-md-4 img').eq(i).addClass('pokaz');
			},150 *(i+1));
			console.log(i);

		});

		
	}



});



			
	  
 });
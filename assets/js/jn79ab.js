$(function(){

	//For fading out popup when clicked on the background
	$("body").click(function(event ){
		var $target = $(event.target);
		if(!$target.parents().is(".popup") && !$target.is(".popup") && !$target.is("#Keywords") && !$target.parents().is(".ui-autocomplete"))
		{
			$('.ptrigger-selected').removeClass('ptrigger-selected');
			$("body").find(".popup").fadeOut(200);
		}
	});

	$('#go-to-top-button').click(function(){
  		$('html, body').animate({
		    scrollTop: 0
		});
		return false;
  	});


	$(window).scroll(function(){
  		scrollTop	= $(window).scrollTop();
  		
  		try{
  			optimize_theSlidingAds();
  		}
  		catch(err)
  		{
  			//Admin page
  		}

  		if(scrollTop>150)
  		{
  			$('#go-to-top-button').fadeIn();
  		}
  		else
  		{
  			$('#go-to-top-button').fadeOut();
  		}
  		
  	});

  	$( document ).tooltip({
		content: function(){
			try{
				x = $(this);
				content = x.attr('title');
				return content;
			}
			catch(e)
			{
				
			}
		},
		open: function( e, ui ) {
			tt = ui.tooltip;
			big_pop = tt.find('.popup-text-big').length;
			
			if(big_pop == 1)
				tt.css({'max-width' : '500px'});
		}
	});

	$('.g-tabs>ul>li.tab').click(function(){
		if($(this).hasClass('active'))
			return false;
		$('.active').removeClass('active');
		$(this).addClass('active');
		div = $(this).find('a').attr('href');
		$(div).addClass('active');
		return false;
	});

	//if only the page has the hot list then
	// if($('#hotjobList').length)
	// {
	// 	$('#hotjobList').totemticker({
	// 		row_height : '66px',
	// 		interval: 5000,
	// 		mousestop: true,
	// 		speed: 700
	// 	});
	// 	optimize_theHotList();
	// }

});//jQuery function

function optimize_theHotList()
{
	// centerContent_height = $('#main-content-wrapper').height();
	// hotJobBox_height = $('#hot-jobs-content-holder').outerHeight();
	// hjHeader_height = $('#hotjobs-box-header').height();
	//
	// if(hotJobBox_height > centerContent_height)
	// {
	// 	$('#hotjobList').height(centerContent_height - hjHeader_height-50);
	// }
	// $('.hotjobs-box').height($('#hotjobList').outerHeight() + hjHeader_height + 50);
}
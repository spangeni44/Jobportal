$(function(){

	$("#UserName").focus(function(){if($(this).val()=="Username") $(this).val("");});
	$("#UserName").blur(function(){ if($(this).val()=="") $(this).val("Username");});
	$("#Password").focus(function(){ if($(this).val()=="Password") $(this).val("");})
	$("#Password").blur(function(){ if($(this).val()=="") $(this).val("Password");});

  	fp_messages = [
			"Please enter valid email address.",
			"Your Password has been emailed to you.",
			"The email address you provided is invalid.\n Please try again"
		];

		dlg  = $( "#JNForgotPasswordDiv" );
		formW = $('#JNForgotPasswordFormWrapper');
		msgC	= $('#DivPWMSG')
		
		sbtn = $(".ui-dialog-buttonpane button:contains('Send Me Password')");
    dlg.dialog({
     autoOpen: false,
      
      modal: true,
      buttons: {
      	'Send Me Password': sendPasswordButton_click,
      	'Close': function(){
      		closeDialog();
      	}

      },
      close : function(e, ui){
      	msgC.removeClass('ajax-loader-big');
		msgC.html('');
		msgC.hide();
		formW.show();
		sbtn.button("enable");
      }
    });

    $(".forgotpassword").click(function(){
    	$('#DivPWMSG').removeClass('ajax-loader-big');
  		$('#DivPWMSG').hide();
  		$('#JNForgotPasswordFormWrapper').show();

    	$( "#JNForgotPasswordDiv" ).dialog( "open" );
    	return false;
    });

    $('#JNForgotPasswordForm').submit(function(){
		return false;
    });

    $(window).resize(function(){
   
    	resize_joboverview();
    	optimize_theSlidingAds();
    });

    optimize_theHotList();
	optimize_theSlidingAds();

	$('#btn-login-submit').click(function(){
		$('#company_login_form').submit();	
		return false;
	});
	
	$('#company_login_form input').keypress(function(e){
		if(e.which == 13)
		{
			$('#company_login_form').submit();
			return false;
		}
	});

	$('#company_login_form').submit(function(){
		username = $('#UserName');
		password = $('#Password');

		if(!username.val() || username.val() == 'Username')
		{
			username.focus();
			return false;
		}

		if(!password.val() || password.val() == 'Password')
		{
			password.focus();
			return false;
		}

		$('#btn-login-submit').removeClass('normal').addClass('pressed');
		
	});

	$('#signup-pop-link').click(function(){
		$(this).addClass('ptrigger-selected');
		$('#signup-dropdown-menu-box').fadeIn(200);
		return false;
	})	
});//jQuery function


/** functions */
function closeDialog()
{
	$( "#JNForgotPasswordDiv" ).dialog( "close" );	
	//$('.ui-dialog').hide();
}

function optimize_theSlidingAds()
{
	/*scrollTop	= $(window).scrollTop();

	winHeight = $(window).height();
	scrollBottom =scrollTop+ winHeight;

	if(scrollBottom>= $('#footer-wrapper').position().top)
	{
		$('#sb-wrapper').attr('class', 's-notfixed');
	}
	else
	{
		$('#sb-wrapper').attr('class', 's-fixed-bottom');
		$('#sb-wrapper').width($('#main-content').width() + 8);
	}*/
}

function resize_joboverview()
{
	that = $('#job-overview');
	if(that.width()<=220)
	{
		that.addClass('conjusted');
	}
	else
	{
		that.removeClass('conjusted');
	}
}

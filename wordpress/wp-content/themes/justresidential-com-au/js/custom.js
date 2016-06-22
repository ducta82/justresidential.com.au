$( document ).ready(function() {
    
    var screen_width = $( window ).width();
	var is_hover = false;
	if(screen_width>768){
		$('.navbar-default .navbar-nav>li').hover(function(e){
		e.preventDefault();
		if(is_hover == false){
			is_hover = true;
		}
		$(this).find('>.dropdown-menu').fadeIn('fast');
		console.log('is_hover='+is_hover);
		return false;
	}, function(e){
		e.preventDefault();
		if(is_hover == true){
			is_hover = false;
		}
		$(this).find('>.dropdown-menu').fadeOut('fast');
		console.log('is_hover='+is_hover);
		return false;
	});
	}else{
		$('.navbar-default .navbar-nav li').click(function(e){
			$(this).find('>.dropdown-menu').toggle('fast');
		});
	}
	

	$('.navbar-toggle').click(function(){
		if($('.primary-nav').hasClass('nav-open')){
			$('.primary-nav').removeClass('nav-open');
		}
		else{
			$('.primary-nav').addClass('nav-open');
		}
	});
	if(screen_width<435){
		$('.block-item').removeClass('bottom top');
		$('.info-item-blog').removeClass('bottom top');
	}
	$('.content-page-faq .tittle-post').click(function(){
		var content_post = $(this).parents(".faq-content").find('.content-post');
		console.log(content_post);
		content_post.toggle('slow',function(){
			console.log('toggle');
		});
		$('.content-page-faq .item-post').toggleClass('special');
	});

	$('#comment').keyup(function(event) {
		var input=$(this);
		var message=$(this).val();
		console.log(message);
		if(message){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}	
	});

	$('#author').on('input', function() {
		var input=$(this);
		var is_name=input.val();
		if(is_name){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});

	$('#email').on('input', function() {
		var input=$(this);
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var is_email=re.test(input.val());
		console.log('input.val()'+input.val());
		if(is_email == true){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});
	// After Form Submitted Validation
	$("#commentform").submit(function(event){
		var form_data=$("#commentform").serializeArray();
		var error_free=true;
		var author=$("#author");
		var email=$("#email");
		var comment=$("#comment");
		var valid_author=author.hasClass("valid");
		var valid_email=email.hasClass("valid");
		var valid_comment=comment.hasClass("valid");
		var error_author=$("span", author.parent());
		var error_email=$("span", email.parent());
		var error_comment=$("span", comment.parent());
		if (!valid_author){
			error_author.removeClass("error").addClass("error_show"); 
			error_free=false;
		}else{
			error_author.removeClass("error_show").addClass("error");
		}
		if(!valid_email){
			error_email.removeClass("error").addClass("error_show")
			error_free=false;
		}else{
			error_email.removeClass("error_show").addClass("error");
		}
		if(!valid_comment){
			error_comment.removeClass("error").addClass("error_show")
			error_free=false;
		}else{
			error_comment.removeClass("error_show").addClass("error");
		}
		if (!error_free){
			event.preventDefault();
			console.log('error_free_false = '+error_free);
			return false;
		}
		else{
			console.log('error_free_true = '+error_free);
			return true;
		}
	});
	$('#slider').nivoSlider({
    	effect: 'fade',
    	pauseTime:3000000,
    	prevText:'<i class="fa fa-angle-left"></i>',
    	nextText:'<i class="fa fa-angle-right"></i>'
    }); 
});
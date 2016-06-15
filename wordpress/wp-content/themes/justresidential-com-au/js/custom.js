$( document ).ready(function() {
    $('.carousel').carousel({
		interval: 7000,
		swipe: 30
	});
	var is_hover = false;
	$('.navbar-default .navbar-nav li').hover(function(e){
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
	$('.navbar-toggle').click(function(){
		if($('.primary-nav').hasClass('primary-nav-open')){
			$('.primary-nav').removeClass('primary-nav-open');
		}
		else{
			$('.primary-nav').addClass('primary-nav-open');
		}
	});
	$('.content-page-faq .tittle-post').click(function(){
		$('.content-page-faq .content-post').toggle('slow',function(){
			console.log('ok');
		});
		$('.content-page-faq .item-post').toggleClass('special');
	});
});
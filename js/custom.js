$( document ).ready(function() {
    $('.carousel').carousel({
		interval: 7000,
		swipe: 30
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
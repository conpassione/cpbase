//toggle Hamburger

$(document).ready(function(){
	$('.cp-navItem').click(function(){
		//$('.cp-hamburger').toggleClass('cp-menuOpen');
		$('.cp-hamburger').attr('aria-expanded', false);
		$('.cp-nav--itemList').toggleClass('cp-nav--itemListOpen');
	});
	$('.cp-hamburger').click(function(){
		if ($(this).attr('aria-expanded') === "true") {
			//$(this).removeClass('cp-menuOpen');
			$(this).attr('aria-expanded', false);
			$('.cp-nav--itemList').removeClass('cp-nav--itemListOpen');
		} else {
			//$(this).addClass('cp-menuOpen');
			$(this).attr('aria-expanded', true);
			$('.cp-nav--itemList').addClass('cp-nav--itemListOpen');
		}
		return false;
	});
	$('html').click(function(e){
		if (e.target != $('.cp-hamburger')) {
			//$('.cp-hamburger').removeClass('cp-menuOpen');
			$('.cp-hamburger').attr('aria-expanded', false);
			$('.cp-nav--itemList').removeClass('cp-nav--itemListOpen');
		} else {
			return true;
		}
	});
});
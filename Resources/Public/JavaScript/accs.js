$(document).ready(function(){
  $('.acc-button').click(function(){
  	_this = $(this);
  	if (_this.attr('aria-expanded') == "true") {
	  	_this.attr('aria-expanded', false);
	  	_this.text('plus');
	  	_this.parent().next().attr('aria-expanded', false);
  	} else {
  	  	$('.acc-button').attr('aria-expanded', false);
  	  	$('.acc-button').text('plus');
  	  	$('.acc-content').attr('aria-expanded', false);
  	  	_this.attr('aria-expanded', true);
  	  	_this.text('minus');
  	  	_this.parent().next().attr('aria-expanded', true);
  	};
  });
});


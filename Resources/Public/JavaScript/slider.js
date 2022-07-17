$(document).ready(function() {
	if (cp_bxSliderConfig.length > 0) {
		$.each(cp_bxSliderConfig, function(index){
			sliderName = '.wrap-' + cp_bxSliderConfig[index].sliderName;
			sliderWidth = $(sliderName).width();
			sliderDiff = Number(10 * (cp_bxSliderConfig[index].maxSlides - 1));

			if ((cp_bxSliderConfig[index].minSlides == '') || (cp_bxSliderConfig[index].maxSlides == '')) {
				cp_bxSliderConfig[index].minSlides = 1;
				cp_bxSliderConfig[index].maxSlides = 1;
			}
			cp_bxSliderConfig[index].slideWidth = 0;
			if (cp_bxSliderConfig[index].maxSlides > 1) {
				cp_bxSliderConfig[index].slideWidth = Number((960 - sliderDiff)/cp_bxSliderConfig[index].maxSlides);
			}
			$('.' + cp_bxSliderConfig[index].sliderName).bxSlider({
				mode: cp_bxSliderConfig[index].mode,
				speed: cp_bxSliderConfig[index].speed,
				easing: cp_bxSliderConfig[index].easing,
				responsive: true,
				pager: cp_bxSliderConfig[index].pager,
				controls: cp_bxSliderConfig[index].controls,
				auto: true,
				useCSS: true,
				pause: cp_bxSliderConfig[index].pause,
				autoDelay: cp_bxSliderConfig[index].autoDelay,
				minSlides: cp_bxSliderConfig[index].minSlides,
				maxSlides: cp_bxSliderConfig[index].maxSlides,
				moveSlides: 1,
				slideWidth: cp_bxSliderConfig[index].slideWidth,
				slideMargin: 2,
				shrinkItems: 1,
				infiniteLoop: true,
			});
	  });
	}
});
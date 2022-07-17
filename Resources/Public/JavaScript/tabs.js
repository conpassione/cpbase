$(document).ready(function(){
  $('.jquery_tabs').accessibleTabs({
    syncheights: false,
    fx: "fadeIn",
    fxspeed: 'fast',
    tabhead: '.tab-header',
    tabbody: '.tab-content'
  });
  $('.jquery_accordions').accordion({
    header: ".acc-header",
    heightStyle: "content",
    collapsible: true,
    active: true,
    animate: {easing:"easeInOutQuint", duration:500}
  });
});


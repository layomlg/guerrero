/*
$("div.art > div.img").mouseenter(function(){
      if( $(window).width() > 768){
        $(this).siblings("div.art-desc").css("display", "block");
      }
    });
    $("div.art").mouseleave(function(){
      if( $(window).width() > 768){
        $(this).children("div.art-desc").css("display", "none");
      }
    });
    $("div.art > div.img").click(function(){
      if( $(window).width() < 768 && $(window).width() < 768){
        $("div.art > div.art-desc").css("display", "none"); 
        $(this).siblings("div.art-desc").toggle();
         }    
    });
 */   
$( "button.canjear" ).click(function() {
  $( "div.toast" ).fadeIn( "slow" );

  setTimeout(closeToast, 2000);

});
$( "p.canjear" ).click(function() {
  $( "div.toast" ).fadeIn( "slow" );

  setTimeout(closeToast, 2000);

});
$( "span.canjear" ).click(function() {
  $( "div.toast" ).fadeIn( "slow" );

  setTimeout(closeToast, 2000);

});
$( "img.canjear" ).click(function() {
  $( "div.toast" ).fadeIn( "slow" );

  setTimeout(closeToast, 2000);

});
$( "img.addfav" ).click(function() {
  $( "div.toast" ).fadeIn( "slow" );

  setTimeout(closeToast, 2000);

});

var closeToast = function(){
  $( "div.toast" ).fadeOut( "slow" );
};


$( "p.cls" ).click(function() {
  $( "div.toastg" ).fadeIn( "slow" );
  setTimeout(closeToastg, 2000); 
});
var closeToastg = function(){
  $( "div.toastg" ).fadeOut( "slow" );
};
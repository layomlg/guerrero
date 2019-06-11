$( document ).ready(function() {
  h = 0;
  hi = 0;
  $("body > div.contenedor > div:nth-child(2) > div > div > a > div").each(function(){
    var h = $(this).height();
    if (hi < h) {hi = h;}
  });
  hi = hi + "px";
  $("body > div.contenedor > div:nth-child(2) > div > div > a > div").css("height",hi);  
});     
$( window ).resize(function() {
  h = 0;
  hi = 0;
  $("body > div.contenedor > div:nth-child(2) > div > div > a > div").each(function(){
    $(this).css("height","auto");
    var h = $(this).height();
    if (hi < h) {hi = h;}
  });
  hi = hi + "px";
  $("body > div.contenedor > div:nth-child(2) > div > div > a > div").css("height",hi);
});
$( document ).ready(function() {
      if( $(window).width() > 767){
        h = 0;
        hi = 0;
        h = $("div.mnu").height();
        hi = $("div.cnt").height();
        if (hi < h) {hi = h;}
        hi = hi + 10;
        hi = hi + "px";
        $("div.mnu").css("height",hi);
        $("div.cnt").css("height",hi);
        }
      else{
        $("div.mnu").css("height","auto");
        $("div.cnt").css("height","auto");
      }
    });     
    $( window ).resize(function() {
      if( $(window).width() > 767){
        h = 0;
        hi = 0;
        $("div.mnu").css("height","auto");
        $("div.cnt").css("height","auto");
        h = $("div.mnu").height();
        hi = $("div.cnt").height();
        if (hi < h) {hi = h;}
        hi = hi + 10;
        hi = hi + "px";
        $("div.mnu").css("height",hi);
        $("div.cnt").css("height",hi);
      }
      else{
        $("div.mnu").css("height","auto");
        $("div.cnt").css("height","auto");
      }
    });
$("#espec").click(function(){
      $("#espec1").toggle("fast");
      $("#deta1").hide("fast");
    });
    $("#deta").click(function(){
      $("#deta1").toggle("fast");
      $("#espec1").hide("fast");
    });

$( document ).ready(function() {
      h = 0;
      hi = 0;
      h = $("div.elemento.bnr").height();
      hi = $("div.bnrdesc").height();
      if (hi < h) {hi = h;}
      hi = hi + 60;
      hi = hi + "px";
      $("div.elemento.bnr").css("height",hi);
    });     
    $( window ).resize(function() {
      h = 0;
      hi = 0;
      $("div.elemento.bnr").css("height","auto");
      h = $("div.elemento.bnr").height();
      hi = $("div.bnrdesc").height();
      if (hi < h) {hi = h;}
      hi = hi + 60;
      hi = hi + "px";
      $("div.elemento.bnr").css("height",hi);
    });
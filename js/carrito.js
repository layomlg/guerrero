$( document ).ready(function() {
      h = 0;
      hi = 0;
      hii = 0;
      h = $("div.mnu1").height();
      hi = $("div.mnu2").height();
      hii = $("div.mnu3").height();
      
      if (hi < h) {hi = h;}
      if (hi < hii) {hi = hii;}
      $("div.mnu1").css("height",hi);
      $("div.mnu2").css("height",hi);
      $("div.mnu3").css("height",hi);
    });     
    $( window ).resize(function() {
      h = 0;
      hi = 0;
      hii = 0;
      $("div.mnu1").css("height","auto");
      $("div.mnu2").css("height","auto");
      $("div.mnu3").css("height","auto");
      h = $("div.mnu1").height();
      hi = $("div.mnu2").height();
      hii = $("div.mnu3").height();
      
      if (hi < h) {hi = h;}
      if (hi < hii) {hi = hii;}
      $("div.mnu1").css("height",hi);
      $("div.mnu2").css("height",hi);
      $("div.mnu3").css("height",hi);
    });
    

    $("#a1").click(function(){
      $("div.step1").css("display","none");
      $("div.step2").css("display","block");
      $("div.mnu2").addClass("active");
      /*$("div.mnu1").removeClass("active");*/
      
      
    });
    $("#b2").click(function(){
      $("div.step1").css("display","block");
      $("div.step2").css("display","none");
      $("div.mnu1").addClass("active");
      $("div.mnu2").removeClass("active");
      
      
    });
    $("#a2").click(function(){
      $("div.step2").css("display","none");
      $("div.step3").css("display","block");
      $("div.mnu3").addClass("active");
      /*$("div.mnu2").removeClass("active");*/
      
      
    });
    $("#b3").click(function(){
      $("div.step3").css("display","none");
      $("div.step2").css("display","block");
      $("div.mnu2").addClass("active");
      $("div.mnu3").removeClass("active");
      
      
    });
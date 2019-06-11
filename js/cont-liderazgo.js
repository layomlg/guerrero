$( document ).ready(function() {
  var c = ["http://garra.layator.com/archivos/liderazgo/ABC%20CLUSTERIZACI%C3%93N.pdf",
           "http://garra.layator.com/archivos/liderazgo/COMO%20SE%20CALCULA%20TU%20BONO.pdf",
           "http://garra.layator.com/archivos/liderazgo/LA%20IMPORTANCIA%20DE%20ACTIVOS%20Y%20RENTABILIDAD.pdf",
           "http://garra.layator.com/archivos/liderazgo/TENDENCIAS%20DEL%20CANAL%20MODERNO.pdf",
           "http://garra.layator.com/archivos/liderazgo/TIENDAS%20DE%20CONVENIENCIA.pdf",
           "http://garra.layator.com/archivos/liderazgo/TU%20LIDERAZGO%20BONAFONT.pdf",
           "./archivos/liderazgo/Video1-EverydayLeadership.mp4",
           "./archivos/liderazgo/Video1-LIDERAZGO.mp4",
           "./archivos/liderazgo/Video2-%20ACTITUD.m4v",
           "./archivos/liderazgo/Video3%20-Zinedine%20Zidane.mp4"];

  var url1 = 'https://docs.google.com/viewer?url=';
  var url2 = '&embedded=true';


  $(".recursos > a").click(function(){
    $(".recursos > a").removeClass("active");
    $(this).addClass("active");
    var cid = $(this).attr("id").substr(1);
    var url3 = c[cid];
    if(cid < 6){
      var url= url1 + url3 + url2;
      $("iframe.a-cont").attr("src",url);
      $("a.descarga").attr("href",url3);
      $("iframe.a-cont").css("display","block"); 
      $("video.a-cont").css("display","none"); 
      $("img.a-cont").css("display","none"); 
    }
    else{
      var url= url3;
      $('video.a-cont').attr("src",url);
      $("a.descarga").attr("href",url);
      $("iframe.a-cont").css("display","none"); 
      $("video.a-cont").css("display","block"); 
      $("img.a-cont").css("display","none");  
    }
  });
});
$( document ).ready(function() {
   var c = ["http://garra.layator.com/archivos/ventas/COMO%20SE%20CALCULA%20TU%20BONO.pdf",
           "http://garra.layator.com/archivos/ventas/DISCIPLINA%20OPERATIVA%20UTTT%20LDP%20.pdf",
           "http://garra.layator.com/archivos/ventas/LA%20IMPORTANCIA%20DE%20ACTIVOS%20Y%20RENTABILIDAD.pdf",
           "http://garra.layator.com/archivos/ventas/Los%20secretos%20y%20tendencias%20del%20canal%20moderno.pdf",
           "http://garra.layator.com/archivos/ventas/MANUAL-%20Lideres%20de%20Plaza.pdf",
           "http://garra.layator.com/archivos/ventas/ROTACI%C3%93N%20Y%20MODELO%20STAR.pdf",
           "./archivos/ventas/El%20Tiempo-Casa%20de%20Papel.mp4"];

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
    else if(cid < 9){
      var url= url3;
      $('video.a-cont').attr("src",url);
      $("a.descarga").attr("href",url);
      $("iframe.a-cont").css("display","none"); 
      $("video.a-cont").css("display","block"); 
      $("img.a-cont").css("display","none");  
    }
    else {
      var url= url3;
      $('img.a-cont').attr("src",url);
      $("a.descarga").attr("href",url);
      $("iframe.a-cont").css("display","none"); 
      $("video.a-cont").css("display","none"); 
      $("img.a-cont").css("display","block");
    }
  });
});
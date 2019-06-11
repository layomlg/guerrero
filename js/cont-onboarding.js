$( document ).ready(function() {
  var c = ["http://garra.layator.com/archivos/onboarding/ON%20BOARDING%202018%20%20-%20ASESOR%20DE%20VENTA.pdf",
           "http://garra.layator.com/archivos/onboarding/EDV%20ENERO%202018.pdf",
           "http://garra.layator.com/archivos/onboarding/EDV%20FEBRERO%202018.pdf",
           "http://garra.layator.com/archivos/onboarding/EDV%20MARZO%202018.pdf",
           "http://garra.layator.com/archivos/onboarding/EDV%20MAYO%202018.pdf",
           "http://garra.layator.com/archivos/onboarding/EDV%20JUNIO%202018.pdf",
           "./archivos/onboarding/ESP%C3%8DRITU%20JAGUAR%2005%20MAR_V1%20ligero.mp4",
           "./archivos/onboarding/PASOS%20DE%20LA%20EJECUCION%20ASESOR%20DE%20VENTAS%20UTT.mp4",
           "./archivos/onboarding/PASOS%20DE%20LA%20EJECUCI%C3%93N%20LIDER%20DE%20PLAZA.mp4",
           "http://garra.layator.com/archivos/onboarding/PASOS%20DE%20LA%20EJECUCION%20ASESOR%20DE%20VENTAS%20UTT.JPG",
           "http://garra.layator.com/archivos/onboarding/PASOS%20DE%20LA%20EJECUCION%20LIDER%20DE%20PLAZA%20UTT.JPG"];

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
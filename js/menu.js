$( document ).ready(function() {
  $('button.outline.canje.fav').hover(
    function(){
      $(this).children("img").attr('src','./Images/svg/heart.svg');
    },
    function(){
      $(this).children("img").attr('src','./Images/svg/heartf.svg');
    }
  );
  $('button.outline.canje.cje').hover(
    function(){
      $(this).children("img").attr('src','./Images/svg/cart.svg');
    },
    function(){
      $(this).children("img").attr('src','./Images/svg/carto.svg');
    }
  );

  $("div.animacion-carga").css("display","none");
});

$("button.btn-menu").click(function(){
  $(".nav-contenedor.left").toggle("fast");
});
/*
$("div.nav-contenedor.left > ul > li:nth-child(7)").click(function(){
  $("div.cat-contenedor").toggle("fast");
});*/
$("#btn-s").click(function(){
  $("div.search-contenedor").toggle("fast");
});
$("#btn-s1").click(function(){
  $("div.search-contenedor").toggle("fast");
});
/*
$(".mnu-cuenta").hover(function(){
  $("div.carrito-contenedor").show("fast");
});
$("div.carrito-contenedor").mouseleave(function(){
  $("div.carrito-contenedor").hide("fast");
});
$("div.header").mouseleave(function(){
  $("div.carrito-contenedor").hide("fast");
});
*/
$(".btn-carrito").click(function(){
  $("div.carrito-contenedor").toggle("fast");
});
$(".nav-contenedor.left").mouseleave(function(){
  $(".nav-contenedor.left").toggle("fast");
});

/*
$("#cat-li").mouseenter(function(){
  if($(window).width() > 768 ){
    $(".nav-contenedor.left > ul").css("width","600px");    
  }

});
$("#cat-li").mouseleave(function(){
  if($(window).width() > 768 ){
    $(".nav-contenedor.left > ul").css("width","350px");    
  }
});
*/

/*************************************/
function agregar(idProd, idUsr){
  console.log(idProd);
  console.log(idUsr);

  $.ajax({
    url: "query.php",
    type: "POST",  
    data: {
      idProd: idProd,
      idUsr: idUsr
    },
    async: false,
    dataType: "json",
    success: function(data) {
      if (data.success == true )  {
        alert(data.msg);
      } else {  
        alert(data.msg);
        return false;
      }
    }
  });
  setTimeout("recarga()",700);
}

function eliminar(idProd, idUsr){
  console.log(idProd);
  console.log(idUsr);

  $.ajax({
    url: "eliminar.php",
    type: "POST",  
    data: {
      idProd: idProd,
      idUsr: idUsr
    },
    async: false,
    dataType: "json",
    success: function(data) {
      if (data.success == true )  {
        alert(data.msg);
      } else {  
        alert(data.msg);
        return false;
      }
    }
  });
  setTimeout("recarga()",700);
}

function addfav(idProd, idUsr){
  console.log(idProd);
  console.log(idUsr);

  $.ajax({
    url: "addfav.php",
    type: "POST",  
    data: {
      idProd: idProd,
      idUsr: idUsr
    },
    async: false,
    dataType: "json",
    success: function(data) {
      if (data.success == true )  {
        alert(data.msg);
      } else {  
        alert(data.msg);
        return false;
      }
    }
  });
  setTimeout("recarga()",700);
}





function recarga(){
  location.reload(true);
}
function eliminarfav(idProd, idUsr){
  console.log(idProd);
  console.log(idUsr);

  $.ajax({
    url: "eliminarfav.php",
    type: "POST",  
    data: {
      idProd: idProd,
      idUsr: idUsr
    },
    async: false,
    dataType: "json",
    success: function(data) {
      if (data.success == true )  {
        alert(data.msg);
      } else {  
        alert(data.msg);
        return false;
      }
    }
  });
  setTimeout("recarga()",700);
}





function recarga(){
  location.reload(true);
}
function cart2fav(idProd, idUsr){
  console.log(idProd);
  console.log(idUsr);

  $.ajax({
    url: "cart2fav.php",
    type: "POST",  
    data: {
      idProd: idProd,
      idUsr: idUsr
    },
    async: false,
    dataType: "json",
    success: function(data) {
      if (data.success == true )  {
        alert(data.msg);
      } else {  
        alert(data.msg);
        return false;
      }
    }
  });
  setTimeout("recarga()",700);
}





function recarga(){
  location.reload(true);
}
function fav2cart(idProd, idUsr){
  console.log(idProd);
  console.log(idUsr);

  $.ajax({
    url: "fav2cart.php",
    type: "POST",  
    data: {
      idProd: idProd,
      idUsr: idUsr
    },
    async: false,
    dataType: "json",
    success: function(data) {
      if (data.success == true )  {
        alert(data.msg);
      } else {  
        alert(data.msg);
        return false;
      }
    }
  });
  setTimeout("recarga()",700);
}





function recarga(){
  location.reload(true);
}

$(document).ready(function(){
  $('.contenidocurso').each(function(){
    var hh = $(this).height();
    $(this).css("height",hh+"px");
  });
});
$( window ).resize(function(){
  $('.contenidocurso').each(function(){
    $(this).css("height","auto");
    var hh = $(this).height();
    $(this).css("height",hh+"px");
  });
});


var btn = $('button.outline').click(function(){
  var curso = $(this).data("course");
  
  //Cursos
  var contenidos="div.contenidos." + jQuery.trim(curso).substring(0, 3);
  $(contenidos).removeClass("active");
  var contenidos="#" + curso;
  setTimeout(function(){$(contenidos).addClass("active");} , 200 );

  //Botones
  var boton='div#' + jQuery.trim(curso).substring(0, 3) + ' button';
  $(boton).removeClass("active");
  var boton='*[data-course="' + curso + '"]';
  $(boton).addClass("active");
});

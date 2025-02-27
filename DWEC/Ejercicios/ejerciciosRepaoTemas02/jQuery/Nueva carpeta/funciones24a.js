var x;
x=$(document);
x.ready(resaltar);

function resaltar()
{
  var x=$("#boton1");
  x.click(inicializarEventos);
}

function inicializarEventos()
{
  var x;
  x=$("#parrafos p");
  x.each(resaltarParrafos);
}

function resaltarParrafos()
{
  var caracteres = $("#texto1").val();
  var x=$(this);
  if (x.text().length<caracteres)
  {
    x.css("background-color","#ff0");
  }
}

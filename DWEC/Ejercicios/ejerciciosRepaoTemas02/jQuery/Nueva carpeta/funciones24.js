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
  var x=$(this);
  if (x.text().length<100)
  {
    x.css("background-color","#ff0");
  }
}

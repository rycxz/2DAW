var x;
x=$(document);
x.ready(inicializarEventos);

function inicializarEventos()
{
  var x;
  x=$("#boton1");
  x.click(ocultarItem);
  
  var y;
  y=$("#boton2");
  y.click(ocultarItem1)
}

function ocultarItem()
{
  var x;
  x=$("#lista1 li");
  x.hide();
}

function ocultarItem1()
{
  var y;
  y=$("#lista2 li");
  y.hide();
}
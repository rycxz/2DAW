var x;
x=$(document);
x.ready(inicializarEventos);

function inicializarEventos()
{
  var x=$("#boton1");
  x.click(reducirOpacidadRecuadro);
  x=$("#boton2");
  x.click(aumentarOpacidadRecuadro);
}

function reducirOpacidadRecuadro()
{
  var x=$("#descripcion");
  x.fadeTo("slow",0.25);
}

function aumentarOpacidadRecuadro()
{
  var x=$("#descripcion");
  x.fadeTo("slow",1);
}
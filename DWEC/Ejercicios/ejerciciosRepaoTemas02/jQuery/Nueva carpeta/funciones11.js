var x;
x=$(document);
x.ready(inicializarEventos);

function inicializarEventos()
{
  var x;
  x=$("p");
  x.click(presionParrafoDocumento);
  x=$("#tabla2 p");
  x.click(presionpresionParrafoSegundaTabla);
}

function presionParrafoDocumento()
{
  alert('se ha presionado un párrafo del documento');
}

function presionpresionParrafoSegundaTabla()
{
  alert('se ha presionado un párrafo contenido en la segunda tabla.');
}
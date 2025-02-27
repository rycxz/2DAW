var x;
x=$(document);
x.ready(inicializarEventos);

function inicializarEventos()
{
  var x;
  x=$("td");
  x.mousedown(presionaMouse);
  x.mouseup(sueltaMouse);
  
 var y;
  y=$("#2");
  y.mousedown(presionaMouse2);
}

function presionaMouse()
{
  $(this).css("background-color","#ff0");
}

function sueltaMouse()
{
  $(this).css("background-color","#fff");
}

function presionaMouse2()
{
  $(this).css("background-color","#f00");
}

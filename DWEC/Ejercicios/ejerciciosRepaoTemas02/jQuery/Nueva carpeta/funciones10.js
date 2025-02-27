var x;
x=$(document);
x.ready(inicializarEventos);

function inicializarEventos()
{
  var x;
  x=$("strong");
  x.click(presionaNegrita);
}

function presionaNegrita()
{
  var x;
  x=$("strong");
  x.hide();
}

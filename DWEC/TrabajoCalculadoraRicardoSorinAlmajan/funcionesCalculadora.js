let operando1 = "";
let operando2 = "";
let operadorActual = "";

//me creo mis variable

//capturo los botoners y el display donde salen los numeros
var botones = document.getElementsByClassName("botones");
var pantalla = document.getElementById("pantalla");

//recorro mis botones y les añado un eventListener con una funcion donde voy a amenjar el tipo de dato que es
for (let i = 0; i < botones.length; i++) {
 botones[i].addEventListener("click", manejarEvento);
}
//aqui esta el maejadorDeEventos  donde redirijo a una funcion o atra segun el dato que es
function manejarEvento(event) {
 var valor = event.target.value;
//aqui cojo el valor  del evento --> lo que me llega es la informacion completa del evento
     // por lo que uso target --> es una propiedad del objeto event que dice basicamente quien disparo el evento
 if (!isNaN(valor) || valor === ",") {
  //compruebo si es un numero o una coma
  manejarNumero(valor);
 } else {
  //si no es ninguna de las dos lo mando para operador
  manejarOperador(valor);
 }
}
//en esta funcion maejo los Numeros
function manejarNumero(valor) {
 pantalla.value += valor;
//muestro por pantalla los numeros
 if (operadorActual === "") {
  //si el operador esta vacio quiere decir que tiene que ser el valor del operador uno por que sino estrai lleno
  operando1 = pantalla.value;
 } else {
  //si el operador tiene valor entonces sera el operador dos
  operando2 = pantalla.value;
 }
}
//aqui manejo los signos y demas
function manejarOperador(operador) {
 switch (operador) {
  //reuno todos los operadores de calculo para
  case "+":
  case "-":
  case "*":
  case "/":
   //hago una comprobacion por si el usuario quiere seguir concadenado operaciones
   if (operadorActual !== "" && operando2 !== "") {
    // si operador  y el operando n oestn vacio llamo a la funcion ue me borrar el operador dos y me guardara el resultado en el operador uno para poder segior concadenado operaciones
    calcularResultado();
   }
   //si no pasa por el if, me guardo el operador y borro el display
   operadorActual = operador;
   pantalla.value = "";
   break;

  case "=":
   //si el usaurio quiere caluclar el resultado
   if (operando1 !== "" && operadorActual !== "" && operando2 !== "") {
    //primero  hago una comprobacion de que efectivamente todos los valores estan llenos
    calcularResultado();
   }
   else {
    //si no se cumple arrojo un error
    pantalla.value = "Error";
   }
   break;
  // si el usuario le da a la C sera que quiere borrar esta funcion estblece todos los valores a ""
  case "C":
   borrar();
   break;
  //si quiere mter una coma
  case ",":
   //si la pantalla no incluye una coma
   if (! (/,/?.test(pantalla.value))) {
    pantalla.value += ",";
    // le pongo una coma donde el usuario desea
   }
   // compruebo en que operador estoy si sgo guardadome los nuemros depues de la coma
   if (operadorActual === "") {
    operando1 = pantalla.value;
   } else {
    //
    operando2 = pantalla.value;
   }
   break;

  case "+/-":
   // para el cambio de signo
   if (pantalla.value !== "") {
    // compruebo que no este vacia
    // paso el valor a float para no perder los decimales al hacer el cambio
    var valor = parseFloat(pantalla.value.replace(",", ".")) * -1;
    // lo multiplico por -1 para qcambairle el signo
    pantalla.value = valor.toString().replace(".", ",");
    //vuelvo a hacer la converison a to string para el calculo (hice la funcionde calculo antes y no la quise cambiar)
          //para evitar esta conversion habia que hacer la conversion cuando me guardo los numeros y depues pasralo a la funcion de caluclar directamente
    if (operadorActual === "") {
     //hago la comprobacion en que operador estoy  y me guardo el valor
     operando1 = pantalla.value;
    } else {
     operando2 = pantalla.value;
    }
   }
   break;
   // en esta caso no he considerado un defualt ya que solo entran los valores de mis botones
 }
}
 // mi funcion para caluclar
function calcularResultado() {
 var resultado = 0;
 // declaor resultado
 // hago la conversion de string a float pero primero cambio --> , por el --> . para poder hacer las operaciones
 var num1 = parseFloat(operando1.replace(",", "."));
 var num2 = parseFloat(operando2.replace(",", "."));
   //hago un sqitch para cada operacion ya que quiero controlar la division
 switch (operadorActual) {
  case "+":
   resultado = num1 + num2;
   break;
  case "-":
   resultado = num1 - num2;
   break;
  case "*":
   resultado = num1 * num2;
   break;
  case "/":
   //si el segundo operador es 0 arrojare un error
   if(  num2 !== 0){

    resultado = num1 / num2;
   } else{
    pantalla.value = "Error";
   }
   break;
 }
 //muestro por pantalla el reusltado
  pantalla.value = resultado;
 //me guardo el resultado en el operador uno , se podria poner operador1 = resultado
 operando1 = pantalla.value;
 operando2 = "";
 //borro operador 2 y signo
 operadorActual = "";
}
// funcion borrar establece a ""
function borrar() {
 pantalla.value = "";
 operando1 = "";
 operando2 = "";
 operadorActual = "";
}

// capturo el selector de color
selectorColor = document.getElementById("selectorColor");
// le añado un evento
selectorColor.addEventListener("change", cambiarColor )
// uso una fucnio para cambiar los colores
function cambiarColor() {
 var colorSeleccionado = selectorColor.value; // saco el valor selecionado
 var calculadora = document.getElementById("calculadora"); // obtengo la calcualdora
// if elese para los colores
 if (colorSeleccionado === "Gris") {
  calculadora.style.backgroundColor = "#333";
 } else if (colorSeleccionado === "Amarillo") {
  calculadora.style.backgroundColor = "#f1c40f";
 } else if (colorSeleccionado === "Verde") {
  calculadora.style.backgroundColor = "#2ecc71";
 }
}





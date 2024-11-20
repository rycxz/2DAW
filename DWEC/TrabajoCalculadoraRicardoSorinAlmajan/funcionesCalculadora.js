// Variables globales
let operando1 = "";
let operando2 = "";
let operadorActual = null;

// capturo los botones y la pantalla
const botones = document.getElementsByClassName("botones");
const pantalla = document.getElementById("pantalla");

// agrego eventos a todos los botones
for (let i = 0; i < botones.length; i++) {
 botones[i].addEventListener("click", manejarEvento);
}

// manejo los eventos de los botones
function manejarEvento(event) {
 const valor = event.target.value;
 /*
  explicación para mí:
  lo que estoy haciendo aquí es capturar la información que recibo del addEventListener
 */
 // me guardo el valor del evento

 // si es un número
 if (!isNaN(valor)) {
  // le mando a la función que maneja los números
  manejarNumero(valor);
 }
 // si es un operador, lo último que queda lo mando a su función
 else {
  manejarOperador(valor);
 }
}

// lo que hace la función borrar es que pone el value de la pantalla a ""
function borrar() {
 pantalla.value = "";
 operando1 = "";
 operando2 = "";
 operadorActual = null;
}

// esto es la función por la que manejo los números sacándolos por pantalla
function manejarNumero(valor) {
 // Si la pantalla está mostrando un resultado o es necesario borrar, se limpia
 if (pantalla.value === "Error" || (operadorActual !== null && operando2 === "")) {
  pantalla.value = "";
 }
 // esto es lo mismo que pantalla = pantalla + número
 pantalla.value += valor;
}

// la función que decide los operadores
function manejarOperador(operador) {
 switch (operador) {
  case "+":
  case "-":
  case "*":
  case "/":
   // si es cualquiera de los 4 operadores
   if (operando1 === "") {
    // compruebo si el operador1 está vacío y si lo está me guardo el valor
    operando1 = pantalla.value;
   } else if (operando2 === "") {
    // hago lo mismo con el operador dos
    operando2 = pantalla.value;
    calcularResultado(); // una vez guardado llamo a la función que me calculará el resultado
   }
   // aquí me guardo el operador actual
   operadorActual = operador;
   break;

     // si le da al botón de calcular
  case "=":
   // hago la comprobación de si el operador 1 y el signo es diferente de 0
   if (operando1 !== "" && operadorActual !== null) {
    operando2 = pantalla.value; // guardar segundo operando
    calcularResultado();
    operadorActual = null; // resetear operador
   }
   break;

  case "C":
   // si el value es "C" es que quiere borrar por lo que lo mando a la función
   borrar();
   break;

  default:
   console.log("Operador no reconocido:", operador);
 }
}

// función que me calcula el resultado
function calcularResultado() {
 // declaro una variable para el resultado
 let resultado = 0;
 // hago un switch para cada operador
 switch (operadorActual) {
     // lo parseo y los calculo
  case "+":
   resultado = parseFloat(operando1) + parseFloat(operando2);
   break;
  case "-":
   resultado = parseFloat(operando1) - parseFloat(operando2);
   break;
  case "*":
   resultado = parseFloat(operando1) * parseFloat(operando2);
   break;
  case "/":
   // explicación: estoy intentando poco a poco cambiar la estructura de mis ifs
   // ya que esta es la que uso en el trabajo y me parece más limpia

   // parseo el 2 operador
   resultado =
       parseFloat(operando2) !== 0
           ? // si se cumple la condición de que el operador 2 es diferente de 0 sigo
           parseFloat(operando1) / parseFloat(operando2)
           : "Error"; // si no muestro el error
   break;
 }
 // muestro en la pantalla el resultado
 pantalla.value = resultado;
 // me guardo el resultado en el operador uno para la siguiente operación
 operando1 = resultado;
 // reinicio el operador dos
 operando2 = "";
}

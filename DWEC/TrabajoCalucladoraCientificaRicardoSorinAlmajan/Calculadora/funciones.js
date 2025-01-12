window.onload = function(){
    var boton = document.getElementsByClassName('botones');
    var pantalla = document.getElementById('pantalla');

       // Variables
    let operador1 = "";
    let operador2 = "";
    let signo = "";
    let historial = "";
    let  valor ="";
    //recorro la coleccion de elemntos del array para asi poder asignarle el event listener
    for (let i = 0; i < boton.length; i++) {
        //lo que quiero hacer es cuando se llame el envento
        // onclik poder obtener el valor del boton que lo detona
        boton[i].addEventListener('click', manejadorEventos);
    }
    function manejadorEventos(event){
          valor = event.target.value;
        // aqui dependiendo del valor del que lo detona hara una cosa u otra
        aignacionOperadores(valor);

        mostrar();
    }
    // capturo el selector de color
    selectorColor = document.getElementById("selectorColor");
    // le añado un evento
    selectorColor.addEventListener("change", cambiarColor )
// uso una fucnio para cambiar los colores
    /*
        funcion donde se elije que operdor sera cargado segun el valor del evento que lo dispara
    */
    function aignacionOperadores(){
        //asignacion del signo de la operacion
          if(valor == "/" || valor == "*" || valor == "-" || valor == "+"){
            signo = valor;
            actualizarPantalla(signo);
        }
           //llamada de funcion que hara las operaciones
           else if (valor == "="){
            if(comrpobacionVariables() == true){
                operaciones();
            }

        }
        // asignacion del operador 2
        else if(operador1 != "" &&  signo != "" ){
            var aux = operador2+""+valor;
            if( validarComa(aux) == true ){
            operador2 += valor;
            actualizarPantalla(operador2);
          }
        }
        //asiganacion del operador 1
        else if ( historial == "" && signo == ""){
            var aux = operador1+""+valor;
            if( validarComa(aux) == true ){
                operador1 += valor;
                actualizarPantalla(operador1);
            }

        }
        // asigancion del historial de la apicacion
        else if(historial != "" && signo == ""){
            operador1 = historial;
        }

    }

function validarComa(input) {
    const regex = /^[^,]*,?[^,]*$/;
    return regex.test(input);
}
function mostrar(){
    console.log("-----------------------")
    console.log(operador1);
    console.log(operador2);
    console.log(signo);
    console.log(historial);
}
function actualizarPantalla(operador){
 pantalla.value= "";
 pantalla.value+= operador;

}
function operaciones(){
    //declaracion de varible auxiliar y parseo de numeros cambiado la coma por un punto
    var resultado = 0;
    var num1 = parseFloat(operador1.replace(",", "."));
    var num2 = parseFloat(operador2.replace(",", "."));

    switch (signo) {
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

    actualizarPantalla(resultado);
    //me guardo el resultado en el operador uno , se podria poner operador1 = resultado
    historial = operador1;
    operando2 = "";
    signo = "";
   }
function comrpobacionVariables(){
    if(operador1 != "" && operador2 != "" && signo != ""){
        return true;
    }
    else{
        return false;
    }
}
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
function truncarResultadoDecimal(resultado) {
    const parteEntera = resultado.toString().match(/^\d+/);
    return parteEntera ? parteEntera[0] : "0";
}
}






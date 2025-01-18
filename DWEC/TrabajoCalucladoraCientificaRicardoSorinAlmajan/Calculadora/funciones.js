window.onload = function(){
    var boton = document.getElementsByClassName('botones');
    var pantalla = document.getElementById('pantalla');
    var botonesCientifica = document.getElementsByName('botonesCient')
    pantalla.value=0;
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
        document.addEventListener("keydown", function(event) {

            const valor = event.key;
            if (!isNaN(valor)) {
                for (let i = 0; i < boton.length; i++) {
                    if(boton[i].value == valor){
                        boton[i].click();
                    }
                }
            } else {
                switch (valor) {
                    case "+":
                        document.getElementById("mas").click();
                        break;
                    case "-":
                        document.getElementById("restar").click();
                        break;
                    case "*":
                        document.getElementById("multiplicar").click();
                        break;
                    case "/":
                        document.getElementById("dividir").click();
                        break;
                    case "^":
                        document.getElementById("potencia").click();
                        break;
                    case ".":
                        case ",":
                        document.getElementById("coma").click();
                        break;
                    case "Enter":
                        document.getElementById("igual").click();
                        break;
                    case "%":

                        document.getElementById("resto").click();
                        break;
                    case "Backspace":
                        pantalla.value = pantalla.value.slice(0, -1);
                        if (pantalla.value === '') {
                            operador1 = null;
                        } else {
                            operador1 = parseFloat(pantalla.value);
                        }
                        break;
                    case "c":
                        operador1="";
                        operador2="";
                        signo="";
                        historial="";
                        pantalla.value="";
                        break;
                }
            }
        });

        // aqui dependiendo del valor del que lo detona hara una cosa u otra


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
          if(valor == "/" || valor == "*" || valor == "-" || valor == "+" || valor=="^"){
            if(pantalla.value != signo){
                signo = valor;
                actualizarPantalla(signo);
            }

        }
        else if(valor=="cientifica"){
            if(document.getElementById('cientifica').checked ==true){
                for (let i = 0; i < botonesCientifica.length; i++) {
                    botonesCientifica[i].hidden= false
                 }
            }else{
                for (let i = 0; i < botonesCientifica.length; i++) {
                    botonesCientifica[i].hidden= true
                 }
            }

        }
        else if(valor=="+/-"){
            if(operador1!="" && operador2== ""){
                operador1=operador1*(-1);
                actualizarPantalla(operador1);
            }else if (operador2 != "" ){
                operador2=operador2*(-1);
                actualizarPantalla(operador2);
            }
        }
           //llamada de funcion que hara las operaciones
           else if (valor == "="){
            if(comrpobacionVariables() == true){
                operaciones();
            }

        }
        //botones de C y CE
        else if( valor == "C" || valor == "CE"){
            if( valor == "C"){
                operador1="";
                operador2="";
                signo="";
                historial="";
                pantalla.value="";
            }
            else if(valor =="CE"){
                if(operador1!="" && operador2== ""){
                    operador1="";
                    pantalla.value="";
                }else if (operador2 != "" ){
                    operador2="";
                    pantalla.value="";
                }
            }
        }
        else if(valor =="PI" || valor == "E"){
                if(operador2 == "" &&signo != ""  ){
                    if (valor == "PI"){
                    operador2 = Math.PI;
                    }else{
                        operador2=Math.E;
                    }
                    actualizarPantalla(operador2);

                }
                else if ( operador1==0 && signo ==""){
                    if (valor == "PI"){
                        operador1 = Math.PI;
                        }else{
                            operador1 = Math.E;
                        }
                        actualizarPantalla(operador1);
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
            historial="";
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
    if (validarComa(operador1) && validarComa(operador2)) {
        var num1 = parseFloat(String(operador1).replace(",", "."));
        var num2 = parseFloat(String(operador2).replace(",", "."));
    }else{
        var num1 = parseFloat(operador1);
        var num2 = parseFloat(operador2);
    }
    switch (signo) {
        case "^":
            resultado=potencia(num1,num2);
            repuesta(resultado);
        break;
     case "+":
      resultado = num1 + num2;
      repuesta(resultado);
      break;
     case "-":
      resultado = num1 - num2;
      repuesta(resultado);
      break;
     case "*":
      resultado = num1 * num2;
      repuesta(resultado);

      break;
     case "/":
      //si el segundo operador es 0 arrojare un error
      if(  num2 != 0){
       resultado = num1 / num2;
       repuesta(resultado);

      } else if (num2 == 0){
       pantalla.value = "Error";
        operador1="";
        historial="";
      }
      break;
    }
    //me guardo el resultado en el operador uno , se podria poner operador1 = resultado

   }
   function potencia(base,exponente){
    return Math.pow(base,exponente);
   }
   function truncarRepetidos(numero) {
    let numeroComoCadena = numero.toString();
    let regex = new RegExp(`^(\\d+\\.\\d{${5}})\\d*$`);
    let resultado = numeroComoCadena.replace(regex, "$1");
    return parseFloat(resultado);
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
   function repuesta(resultado){
    resultado = truncarRepetidos(resultado);
    historial= resultado;
    operador1=historial;
    operador2 = "";
    signo = "";
    actualizarPantalla(operador1);
   }

}






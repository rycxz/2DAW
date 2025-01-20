window.onload = function(){
    var boton = document.getElementsByClassName('botones');
    var pantalla = document.getElementById('pantalla');
    var botonesCientifica = document.getElementsByName('botonesCient')
    var botonesGRF = document.getElementsByName('botonesGRF')
    pantalla.value=0;

       // Variables
    let operador1 = "";
    let operador2 = "";
    let signo = "";
    let historial = "";
    let  valor ="";
    let aux = "";
    let auxoP = "";

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
          if(valor == "/" || valor == "*" || valor == "-" || valor == "+" || valor=="^"||valor=="%"){
            if(operador1 != "" ){

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
        else if(valor=="ABS"){
            if(operador2 == "" &&signo == ""  ){
                operador1 = Math.abs(operador1);
                actualizarPantalla(operador1);
            }
            else if ( operador2!=0 && signo !=""){
                operador2 = Math.abs(operador2);
                actualizarPantalla(operador2);
            }
        }
        else if(valor == "SEN" || valor == "COS" ||valor == "TAN" ){
                switch(valor){
                    case "SEN":
                        auxoP="";
                        auxoP = "SEN";
                        if(operador2== ""){
                            signo="+";
                            aux += operador1;
                            pantalla.value = ""
                            pantalla.value = "sen " + operador1
                                operador1=calcularSeno(gradosARadianes(operador1));
                    }else if (operador2 != "" ){
                        aux += operador2;
                        actualizarPantalla(aux);
                        operador2=calcularSeno(gradosARadianes(operador2));
                    }
                        break;
                        case "COS":
                            aux= "";
                            aux= "COS ";
                            auxoP="";
                            auxoP = "COS";
                            signo="+";
                            if(operador2== ""){
                                aux += operador1;
                                actualizarPantalla(aux);
                                operador1=calcularCoseno(gradosARadianes(operador1));
                                operador2=0;
                        }else if (operador2 != "" ){
                            aux += operador2;
                            actualizarPantalla(aux);
                            operador2=calcularCoseno(gradosARadianes(operador2));
                        }
                        break;
                        case "TAN":
                            aux= "";
                            aux= "TAN ";
                            auxoP="";
                            auxoP = "TAN";
                            signo="+";
                            operacionesTrigo(valor);
                            if(operador2== ""){
                                aux += operador1;
                                actualizarPantalla(aux);
                                operador1=calcularTangente(gradosARadianes(operador1));
                                operador2=0;
                        }else if (operador2 != "" ){
                            aux += operador2;
                            actualizarPantalla(aux)
                            operador2=calcularTangente(gradosARadianes(operador2));
                        }
                        break;

                }
        }
        else if(valor =="X"){
            operador1+="X";
            pantalla.value=operador1
        }
        else if(valor=="grafica"){
            if(document.getElementById('grafica').checked ==true){
                document.getElementById('cientifica').checked ==true
                    for (let i = 0; i < botonesGRF.length; i++) {
                        botonesGRF[i].hidden= false
                     }

            }else{
                for (let i = 0; i < botonesGRF.length; i++) {
                    botonesGRF[i].hidden= false
                 }
            }

        }
        else if(valor == "LOG10" || valor == "LOG2" ||valor == "LN"||valor == "SQRT"||valor == "RAIZn" ){
            switch(valor){
                case "LOG10":
                    aux= "";
                    aux= "LOG10 ";
                    auxoP="";
                    auxoP = "LOG10";
                    signo="+";
                    if(operador2== ""){
                        aux += operador1;
                        actualizarPantalla(aux);
                        operador1=calcularLog10(operador1);
                        operador2=0;
                }else if (operador2 != "" ){
                    aux += operador2;
                    actualizarPantalla(aux);
                    operador2=calcularLog10(operador2);
                }
                    break;
                    case "LOG2":
                        aux= "";
                        aux= "LOG2 ";
                        auxoP="";
                        auxoP = "LOG2";
                        signo="+";
                        if(operador2== ""){
                            aux += operador1;
                            actualizarPantalla(aux);
                            operador1=calcularLog2(operador1);
                            operador2=0;
                    }else if (operador2 != "" ){
                        aux += operador2;
                        actualizarPantalla(aux);
                        operador2=calcularLog2(operador2);
                    }
                    break;
                    case "LN":
                        aux= "";
                        aux= "LN ";
                        auxoP="";
                        auxoP = "LN";
                        signo="+";
                        if(operador2== ""){
                            aux += operador1;
                            actualizarPantalla(aux);
                            operador1=calcularLn(operador1);
                            operador2=0;
                    }else if (operador2 != "" ){
                        aux += operador2;
                        actualizarPantalla(aux);
                        operador2=calcularLn(operador2);
                    }
                    break;
                    case "SQRT":
                        aux= "";
                        aux= "SQRT ";
                        auxoP="";
                        auxoP = "SQRT";
                        signo="+";
                        if(operador2== ""){
                            aux += operador1;
                            actualizarPantalla(aux);
                            operador1=calcularRaizCuadrada(operador1);
                            operador2=0;
                    }else if (operador2 != "" ){
                        aux += operador2;
                        actualizarPantalla(aux);
                        operador2=calcularRaizCuadrada(operador2);
                    }
                    break;
                    case "RAIZn":
                        aux = "";
                        aux = "RAIZn ";
                        auxoP = "RAIZn";

                        if (operador1 !== "") {
                            if (operador2 === "") {
                                pantalla.value += "√";
                            } else {
                                let resultado = calcularRaizN(parseFloat(operador1), parseFloat(operador2));
                                repuesta(resultado);
                            }
                        } else {
                            pantalla.value = "Error: Falta el número base";
                        }
                        break;



            }
    }
        else if(valor == "M" || valor == "M+" ||valor == "MC"||valor == "MR"){
            switch(valor){
                case "M":
                    historial=pantalla.value;
                    break;
                    case "M+":
                        if(historial ==""){
                            historial=0;
                        }
                        else{
                            operador1=pantalla.value+historial;
                        }
                        break;
                        case "MC":
                            historial=0;
                            break;
                            case "MR":
                                pantalla.value=historial;
                                operador1=historial;
                                break;
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
                pantalla.value= "";
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
                pantalla.value="0";
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
        else if(operador1 != "" &&  signo != ""){
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

function calcularRaizN(numero, n) {
    return Math.pow(numero, 1 / n);
}
function calcularRaizCuadrada(numero) {
    return Math.sqrt(numero); a
}
function calcularLog10(numero) {
    return Math.log10(numero);
}
function calcularLog2(numero) {
    return Math.log2(numero);
}

function calcularLn(numero) {
    return Math.log(numero);
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

    if (validarComa(operador1) == true || validarComa(operador2) == true ) {
        if(operador1=== ","){
            operador1=0;
        }
        else if( operador2 == ","){
            operador2=0;
        }
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
      case "%":
        resultado = num1%num2;
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
function operadoresTrig(){
    if(auxoP== "SEN" ||auxoP== "COS" ||auxoP== "TAN" ){
            if(operador1 == 0 ){
                actualizarPantalla(operador2)
            }else if(operador2 == 0){
                actualizarPantalla(operador1)
            }
    }
}
function comrpobacionVariables(){
    if(operador2 == ""){
        operador2=0;
    }
    if(operador1 != "" && signo != ""){

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
function calcularSeno(radianes) {
    return Math.sin(radianes);
}
function calcularCoseno(radianes) {
    return Math.cos(radianes);
}
function calcularTangente(radianes) {
    return Math.tan(radianes);
}
function gradosARadianes(grados) {
    return grados * (Math.PI / 180);
}




var canvas = document.getElementById('miCanvas');
var ctx = canvas.getContext('2d');
var width = canvas.width;
var height = canvas.height;

ctx.clearRect(0, 0, width, height);
dibujarEjes(ctx, width, height);

document.getElementById("boton").onclick = function funcionPrincipal() {
    var canvas = document.getElementById('miCanvas');
    var ctx = canvas.getContext('2d');
    var texto = document.getElementById('textoFuncion').value;
    var width = canvas.width;
    var height = canvas.height;

    ctx.clearRect(0, 0, width, height);
    dibujarEjes(ctx, width, height);
    dibujarFuncion(ctx, texto, width, height);
};
}

function dibujarEjes(ctx, width, height) {
ctx.beginPath();
ctx.strokeStyle = "black";

ctx.moveTo(0, height / 2);
ctx.lineTo(width, height / 2);
ctx.moveTo(width / 2, 0);
ctx.lineTo(width / 2, height);

ctx.stroke();
}

function dibujarFuncion(ctx, texto, width, height) {
var escalaX = 10;
var escalaY = 10;
var centroX = width / 2;
var centroY = height / 2;

ctx.beginPath();
ctx.strokeStyle = "blue";

for (var iX = 0; iX < width; iX++) {
    var ejeX = (iX - centroX) / escalaX;
    var ejeY = cambiarX(texto, ejeX);

    var iY = centroY - ejeY * escalaY;

    if (iX == 0) {
        ctx.moveTo(iX, iY);
    } else {
        ctx.lineTo(iX, iY);
    }
}

ctx.stroke();
}

function cambiarX(funcion, x) {

try {
    return eval(funcion.replace("x", `(${x})`));
} catch (error) {
    return 0;
}

}






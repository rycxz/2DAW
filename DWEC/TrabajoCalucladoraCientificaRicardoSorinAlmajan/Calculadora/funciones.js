window.onload = function(){
    var boton = document.getElementsByClassName('botones');
    var pantalla = document.getElementById('pantalla');
    var hisotrial;
    //recorro la coleccion de elemntos del array para asi poder asignarle el event listener
    for (let i = 0; i < boton.length; i++) {
        //lo que quiero hacer es cuando se llame el envento
        // onclik poder obtener el valor del boton que lo detona
        boton[i].addEventListener('click', averiguarSigno);
    }
    //funcion que engloba todo el tema de los signos
    function averiguarSigno(valor){
     //aqui faltaria comprobar una sola coma decimal y que vaya numero + signo y ya
        const soloMumeros = /^[0-9]*$/;
        //esto lo que hace es asgurarse de que solo se puede poner un signo
        const soloSignos = /^[/*+\-]*$/;

        //puedo forzar el 0 es decir que de primeras el numero pordefecto sea 0sa

        //si es un numero permitir que ponga otro
        if (soloMumeros.test(valor)){
            //saco el numero por el display
        pantalla.value += valor;
    }
    else if(soloSignos.test(valor)){
        pantalla.value= " ";
        pantalla.value = valor;
        }
    }
}





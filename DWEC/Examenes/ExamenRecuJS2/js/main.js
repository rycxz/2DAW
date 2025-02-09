/*1. Cuando se pinche sobre el primer enlace, se oculte su sección relacionada
2. Cuando se vuelva a pinchar sobre el mismo enlace, se muestre otra vez esa sección de
contenidos
3. Completar el resto de enlaces de la página para que su comportamiento sea idéntico al
del primer enlace
4. Cuando una sección se oculte, debe cambiar el mensaje del enlace asociado*/
window.onload=function (){
    var links = document.getElementsByTagName("a");
    var secciones = document.getElementsByTagName("p");
    links[0].addEventListener('click', function(){
        if( secciones[0].hidden == true){
            secciones[0].hidden = false;
            links[0].textContent="Ocultar contendio";
        }else{
            secciones[0].hidden = true;
            links[0].textContent="Mostrar contendio"
        }
    })
    links[1].addEventListener('click', function(){
        if( secciones[1].hidden == true){
            secciones[1].hidden = false;
            links[1].textContent="Ocultar contendio";
        }else{
            secciones[1].hidden = true;
            links[1].textContent="Mostrar contendio"
        }
    })
    links[2].addEventListener('click', function(){
        if( secciones[2].hidden == true){
            secciones[2].hidden = false;
            links[2].textContent="Ocultar contendio";
        }else{
            secciones[2].hidden = true;
            links[2].textContent="Mostrar contendio"
        }
    })

}
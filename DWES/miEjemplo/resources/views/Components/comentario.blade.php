<!-- Asumo que tengo definido un $comentario con el comentario-->
<strong> {{$comentario->autor->apodo}} </strong>
<br>
<p>{{$comentario->texto}}</p>
<ul>
    @foreach($comentario->respuestas as $respuesta)
        <li> <x-comentario :comentario="$respuesta"></x-comentario></li>
    @endforeach
</ul>


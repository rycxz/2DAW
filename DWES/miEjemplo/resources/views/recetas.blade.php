<!-- Header y esas cosas, preferiblemente con componentes.-->
<!-- Asumimos declarada la variable $recetas. -->
@foreach($recetas as $receta)
    <a href="{{url("receta/".$receta->id)}}"><h2>{{$receta->nombre}}</h2></a>
    Por: {{$receta->autor->apodo}}
    <br>
    Creada: {{$receta->created_at}}
    <br>
@endforeach

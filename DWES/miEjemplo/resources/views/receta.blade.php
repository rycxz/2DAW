
    <main>
        <a href="{{url("/recetas")}}">Volver al principio</a>
        <article>
            <h1> {{$receta->nombre}}</h1>
            <h2>Autor: {{$receta->autor->apodo}}</h2>
            <h2>Dificultad: {{$receta->dificultad}}</h2>
            <br><hr>
            <h2>Ingredientes:</h2>
            <ul>
                @foreach($receta->ingredientes as $ingrediente)
                    <li>{{$ingrediente->nombre}}:  {{$ingrediente->pivot->cantidad}} {{$ingrediente->pivot->unidad}}</li>
                @endforeach
            </ul>
            <hr>
            <h2>Descripcion</h2>
            <p>{{$receta->descripcion}}</p>
        </article>
        <hr>
        @foreach($receta->comentarios as $comentario)
            <!--<strong>{{$comentario->autor->apodo}}:</strong>
            <br>
            <p>{{$comentario->texto}}</p>-->
            <x-comentario :comentario="$comentario"></x-comentario>
        @endforeach
    </main>


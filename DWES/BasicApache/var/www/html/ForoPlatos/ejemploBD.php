<?php 
include "conexionBD.php" ;
$resultado = $pdo -> query("select titulo,procedimiento,fecha_creacion,dificultad,tiempo from recetas;");
 

echo "<table>";
while($receta =$resultado->fetch(PDO::FETCH_ASSOC)){
 
     echo" <thead>
                <tr>
                    <th>Título</th>
                    <th>Procedimiento</th>
                 
                    <th>Fecha de Creación</th>
                    <th>Dificultad</th>
                    <th>Tiempo</th>
                </tr>
            </thead>
            <tbody>
                <tr>";
                  
     foreach($receta as $$campo){
    echo "<td> $campo </td>";
     }
     echo "</tr> ";
}
echo "</table>";
 
echo "
<form action='redi.php' method='post'>
<input type='subbmit' name='acction' = value='aniadir'";
$resultado = $pdo -> query("select id,titulo from recetas;");
echo "<select name= 'receta'>
<option value=''>Selecione una receta </option>;
";
while($receta=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo  " <option value = '{$receta['id']}'>{$receta['titulo']} </option>";
}

echo "
<input type='subbmit' name='acction' = value='modificar'>
<input type='subbmit' name='acction' = value='borrar'>
</form>   ";?>
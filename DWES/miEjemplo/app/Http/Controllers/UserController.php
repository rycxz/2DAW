<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create (Request $request){
        //Añadimos reglas de validacion del formulario que viene.
        //  Si una regla falla, echa para atrás.
        $parametros=$request->validate([
            "apodo" => ["required","unique:usuarios","max:250"],
            "email" => ["required","unique:usuarios","email","max:250"],
            "nombre" => ["required","max:250"],
            "apellidos" => ["required","max:250"],
            "contrasena" => ["required","min:6","max:250"],
            "fotoPerfil" => "image",
            "experiencia" => ["required", Rule::in(['Principiante', 'Amateur','Profesional'])]
        ]);
        //TODO: Comprobar que contraseñas coinciden
        unset($parametros['confirmar_contraseña']);

        //Preparamos valores por defecto para BD
        $parametros['esAdmin']=0;
        $parametros['contrasena']=Hash::make($parametros['contrasena']);

        //Generar nombre de la foto
        $nombreFoto = time().'.'.$request->fotoPerfil->extension();
        //Guardar la imagen en public con el nuevo nombre
        $request->fotoPerfil->move(public_path('imagenes'), $nombreFoto);
        //Preparar la ruta de la foto para la BD
        $parametros['fotoPerfil']="imagenes/".$nombreFoto;

        //Creamos el usuario en BD
        $usuario=Usuario::create($parametros);
        //Iniciamos sesion con el usuario recien creado
        Auth::login($usuario);
        //Redirijimos a recetas
        return redirect("/recetas");
    }

    public function login (Request $request){
        $credenciales=$request->validate([
            "apodo" => 'required',
            "contrasena" => ['required','min:6']
        ]);
        //Esto es una chapuza, tendré que ver como usar la credencial que hemos definido
        $credenciales['password']=$credenciales['contrasena'];
        unset($credenciales['contrasena']);
        //Fin de la chapuza
        if(Auth::attempt($credenciales)){
            return redirect()->intended('recetas');
        }
        else{
            return back()->withErrors([
                'apodo' => 'Credenciales incorrectas.',
            ])->onlyInput('apodo');
        }
    }

    public function verPerfil(Request $request){
        if($request->user()->esAdmin==1){
            //perfil del admin
            return view('perfilAdmin');
        }
        else{
            //perfil del logeado
            return view('perfil')->with(['fotoPerfil' => $request->user()->fotoPerfil]);
        }
    }
}

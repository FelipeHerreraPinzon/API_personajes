<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaje;
use Carbon\Carbon;

class PersonajeController extends Controller{


    public function index(){

        $datosPersonaje = Personaje::all();
        return response()->json($datosPersonaje);
    
        }
    

    public function guardar(Request $request){

        $datosPersonaje = new Personaje;


        if($request->hasFile('imagen')){


            $nombreArchivoOriginal = $request->file('imagen')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp."_".$nombreArchivoOriginal;
            $carpetaDestino='./upload/';
            $request->file('imagen')->move($carpetaDestino, $nuevoNombre);

            $datosPersonaje->nombre=$request->nombre;
            $datosPersonaje->profesion=$request->profesion;
            
            $datosPersonaje->imagen=ltrim($carpetaDestino, '.').$nuevoNombre;
            $datosPersonaje->save();


        }
       return response()->json($nuevoNombre);

    }    


    public function ver($id){

        $datosPersonaje = new Personaje;
        $datosEncontrados = $datosPersonaje->find($id);
        return response()->json($datosEncontrados);

    }


    public function eliminar($id){

        $datosPersonaje =  Personaje::find($id);

        if($datosPersonaje){
          $rutaArchivo = base_path('public').$datosPersonaje->imagen;

          if(file_exists($rutaArchivo)){
            unlink($rutaArchivo);
          }
          $datosPersonaje->delete();
        }

        return response()->json("Registro Borrado");
    }


    public function actualizar(Request $request, $id){

        $datosPersonaje =  Personaje::find($id);

        if($request->hasFile('imagen')){


            if($datosPersonaje){
                $rutaArchivo = base_path('public').$datosPersonaje->imagen;
      
                if(file_exists($rutaArchivo)){
                  unlink($rutaArchivo);
                }
                $datosPersonaje->delete();
              }


            $nombreArchivoOriginal = $request->file('imagen')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp."_".$nombreArchivoOriginal;
            $carpetaDestino='./upload/';
            $request->file('imagen')->move($carpetaDestino, $nuevoNombre);
            $datosPersonaje->imagen=ltrim($carpetaDestino, '.').$nuevoNombre;
            $datosPersonaje->save();


        }

        if($request->input('nombre')){
           $datosPersonaje->nombre=$request->input('nombre');
        }

        if($request->input('profesion')){
            $datosPersonaje->profesion=$request->input('profesion');
         }

        $datosPersonaje->save();
        return response()->json("Datos actualizados");

    }

}
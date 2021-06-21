<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Models\gestor;

class cargarController extends Controller

{
    public function index(){

       // return view('repositorio.index');       
   
    }
        


    public function store(Request $request){

      $recurso = new gestor();
       
       $recurso->titulo = $request->titulo;
       $recurso->descripcion = $request->descripcion;
       $recurso->autor = $request->autor;
       $recurso->categoria = $request->categoria;
       $recurso->area = $request->area;
       
       $archivo = $request->file('file');
      
       $nombre_file =  $archivo->getClientOriginalName();
       $ruta = $archivo->storeAs('public', $nombre_file);
           
      $url = Storage::url($ruta);
       
      $recurso->ruta = $url;
      $recurso->save();

      return redirect()->route('cargar.list');

       // return $url; 

       ////////////////////////////////////////////////


    }


    public function list(){
         
        $directory='public';
        $files = storage::allFiles($directory);
        $directories = Storage::directories($directory);
        return view('repositorio.index', compact('directories','files'));
        
        //return $files; 

    }


    public function upload(){
         
        //$archivo = $request->file('file');
        return view('repositorio.upload');
    }

    public function destroy(Request $request, $resultado){
         
        //$archivo = $request->file('file');
        dd('Se puede eliminar');
    }


    

    public function almacenar(Request $request){
         
        $files = $request->file('file');

        foreach ($files as $file) {
           File::create([
            'name' =>  $file->getClientOriginalName()

            ]);




        }
       
    }
    

}




<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\biblioteca;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

class bibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $libros= biblioteca::latest()->get();

        return view('biblioteca', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $max_size = (int)ini_get('upload_max_filesize')*10240;
        $files = $request->file('file');
        $comprimidos= 'biblioteca';

        $libro = new biblioteca();
        $user_id= Auth::id();

        if ($request->hasFile('file')) {
           

              if (Storage::putFileAs('/public/'. $comprimidos . '/', $files, $files->getClientOriginalName())) {
                           
                    $libro->titulo = $request->titulo;
                    $libro->autor = $request->autor;
                    $libro->tema = $request->tema;
                    $libro->resumen = $request->resumen;
                    $libro->user_id=$user_id;
                    $libro->file = $files->getClientOriginalName();
                     
                    $libro->save();
                    $respuesta = "El libro se ha guardado correctamente";
                    //return view('upload', compact('respuesta'));
                    //return redirect()->route('recurso.index');
                    
                   
    
                 } else{
                    $respuesta = "No se logro realizar el cargue del libro";
                    //return view('upload', compact('respuesta'));
                   // return redirect()->route('recurso.index');
                   // 
                         }         
                

        }else{
            
            $respuesta = "No selecciono un archivo";
            //return view('upload', compact('respuesta'));
            //return redirect()->route('recurso.index');

        }

        
        return redirect()->route('biblioteca.index')->with('message',$respuesta);
    }




    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    


    public function destroy($id)
    {
        try {
            $libro = biblioteca::whereId($id)->firstOrFail();

            $libro ->delete();
    
            unlink(public_path('storage/biblioteca/'.$libro->file));
     
            $respuesta = "Libro eliminado";
     
            return redirect()->route('biblioteca.index')->with('message',$respuesta);
        } catch (\Throwable $th) {

            $respuesta = "Libro no pudo ser eliminado";
            
            return redirect()->route('biblioteca.index')->with('message',$respuesta);
        }

       
    }
}

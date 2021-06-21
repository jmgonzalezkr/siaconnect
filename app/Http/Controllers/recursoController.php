<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\gestor;
use function PHPUnit\Framework\returnSelf;
use ZipArchive;
use Illuminate\Filesystem\Filesystem;

class recursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directory='public/zip';
        $files = storage::Files($directory);
        $directories = Storage::directories($directory);

        return view('upload', compact('directories','files'));
        
        //$respuesta ="No ha seleccionado ningún archivo"; 
        

       // $files=gestor::latest()->get();

        //eturn view('upload', compact('files'));
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
        $max_size = (int)ini_get('upload_max_filesize')*10240;
        $files = $request->file('file');
        $comprimidos= 'zip';

        $recurso = new gestor();

        if ($request->hasFile('file')) {


            foreach ($files as $file) {

                if (Storage::putFileAs('/public/'. $comprimidos . '/', $file, $file->getClientOriginalName())) {
                           
                    $recurso->titulo = $request->titulo;
                    $recurso->descripcion = $request->descripcion;
                    $recurso->autor = $request->autor;
                    $recurso->categoria = $request->categoria;
                    $recurso->area = $request->area;
                    $recurso->ruta = $file->getClientOriginalName();
                     
                    $recurso->save();
                    $respuesta = "El recurso se ha guardado correctamente";
                    //return view('upload', compact('respuesta'));
                    //return redirect()->route('recurso.index');
                    
                   
    
                 } else{
                    $respuesta = "No se logro realizar el cargue";
                    //return view('upload', compact('respuesta'));
                   // return redirect()->route('recurso.index');
                   // 
                         }         
                }

        }else{
            $respuesta = "No ha cargado un archivo";
            //return view('upload', compact('respuesta'));
            //return redirect()->route('recurso.index');

        }

        
        return redirect()->route('recurso.index')->with('message',$respuesta);
    }

    
    
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
    public function edit($recurso)
    {
        $directory = public_path('storage/zip/'.$recurso.'/'.$recurso);
       
        $files = File::Files($directory);
        return view('edit', compact('files'));
  
    }

    public function rename(Request $request)
    {

        $path_name = $request -> path_name;
        $rename = $request ->rename;

        $old_file = public_path('storage/zip'.$path_name);
        $new_file = public_path('storage/zip'.$rename);
        
        if (File::move($old_file, $new_file)) {
            //return view('edit')->with('message','Archivo renombrado');
            return redirect()->route('recurso.index')->with('message','El archivo se pudo renombrar');
        } else{

            //return view('edit')->with('message','No se pudo renombrar');
            dd('No se pudo renombrar');
         } 
       // dd($old_file, $new_file);
       /* try {
            if (File::move($old_file, $new_file)) {
                //return view('edit')->with('message','Archivo renombrado');
                dd('Archivo renombrado');
            } else{
    
                //return view('edit')->with('message','No se pudo renombrar');
                dd('No se pudo renombrar');
             } 
        } catch (\Throwable $th) {
            //return view('edit')->with('message','No se pudo renombrar');
            dd('No se pudo renombrar');
        }*/
        
        
        
        
        
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

    
    public function extract(Request $request, $name_path)
    {
        $ruta= public_path('storage/zip/'.$name_path);
        
        $zip = new ZipArchive;
        // Asumiendo que este script está en el mismo directorio del zip, de lo contrario
        // puedes darle la ruta absoluta del archivo 

        if ($zip->open($ruta) === TRUE) {
          $dir = substr($ruta, 0,-4);
          $zip->extractTo($dir.'/');
          $zip->close();
          $mensaje='Archivo descomprimido correctamente..';
          return redirect()->route('recurso.index')->with('message',$mensaje);
        } else {
            $dir = substr($ruta, 0,-4);
            dd('Error descomprimiendo el archivo...'.$dir);
           // Error descomprimiendo el archivo...
        }
        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name_path)
    {   
        $file_zip = public_path('/storage/zip/'.$name_path.'.zip');
        $dir = public_path('/storage/zip/'.$name_path);
        $name_ruta = $name_path.'.zip';
             
        // Borra el registro en la base de datos del recurso
        $file = gestor::where('ruta',$name_ruta);
        $file ->delete();
        
        try {
            // Borra el directorio del recurso
            
            if (file_exists($dir)) {
                File::deleteDirectory($dir);
             }
            
            //Borra el archivo .Zip del recurso
            //Storage::delete(public_path('storage/zip/'.$name_path));

           
            if (file_exists($file_zip)) {
                unlink($file_zip);
                 }
        
            //Retorna la respuesta
            return redirect()->route('recurso.index')->with('message',"El recurso fue eliminado");
         
        } catch (\Throwable $th) {

            //Retorna la respuesta
            return redirect()->route('recurso.index')->with('message',"No fue posible eliminar el recurso");
        }

        
    return back();  
      
        
    }
}

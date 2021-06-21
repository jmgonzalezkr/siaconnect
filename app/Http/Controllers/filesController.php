<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\File;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class filesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta ="No ha seleccionado ningún archivo";
        

        $files= File::latest()->get();

        return view('home', compact('respuesta','files'));

        //return $files;


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
        
        $files = $request->file('file');     
        $user_id= Auth::id();

      

        if ($request->hasFile('file')) {
            
            foreach ($files as $file) {

                if (Storage::putFileAs('/public/'. $user_id . '/', $file, $file->getClientOriginalName())) {
                
    
                    File::create([
                        'name' =>  $file->getClientOriginalName(),
                        'nombre_docente' => $request->profesor,
                        'nombre_estudiante'=> $request->estudiante,
                        'user_id' => $user_id
                        
                        ]);
    
                }
                 
            }

            $respuesta = 'Archivos subidos';

        } else{

            $respuesta = "No se logro realizar el cargue";

        }

      
       // return view('home', compact('respuesta'));
        
        return redirect()->route('home.index');
 
        
  
    }

    public function destroy(Request $request, $id){

       $file = File::whereId($id)->firstOrFail();

       $file ->delete();

       try {
        unlink(public_path('storage'.'/'. Auth::id().'/'.$file->name));
       } catch (\Throwable $th) {
        return back();
       }

       return back();



    }


}

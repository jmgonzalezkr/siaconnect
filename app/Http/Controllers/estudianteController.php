<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gestor;
use App\Models\biblioteca;
use App\Models\File;

class estudianteController extends Controller
{
    public function index()
    {
        $archivos = File::count();
        $libros = biblioteca::count();
        $reda = gestor::where('categoria','=','Recurso')->count();
        $laboratorios = gestor::where('categoria','=','Laboratorio')->count();
       

        return view('estudiante', compact('reda','laboratorios','libros','archivos'));
        
        
    }

    public function recurso()
    {
        
        $redas = gestor::where('categoria','=','Recurso')->get();

        return view('estrecurso', compact('redas'));
        
    }


    public function biblioteca()
    {
        $libros= biblioteca::latest()->get();
        
        return view('estbiblioteca', compact('libros'));
        
    }


    public function laboratorio()
    {
        $Laboratorios = gestor::where('categoria','=','Laboratorio')->get();

        return view('estlaboratorio', compact('Laboratorios'));
        
    }

    public function rapido()
    {
        $files = File::latest()->get();

        return view('estrepositorio', compact('files'));
        
    }

    
}

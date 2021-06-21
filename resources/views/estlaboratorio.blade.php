@extends('layouts.landing')


@section('content')

    <div class="frame">

        <h1><b> Laboratorio digital</b></h1>
    
    </div>

<div class="frame">
<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach ($Laboratorios as $laboratorio)

                               
                    <div class="col">
                    <div class="card">
                        <div class="card-header" style="background-color: #ef6c00; color:white;">
                            {{$laboratorio->titulo}}  - Laboratorio
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">{{$laboratorio->titulo}}</h5>
                        <p class="card-text"> {{$laboratorio->descripcion}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><a href="storage/zip/{{$laboratorio->ruta}}" target="_blank" class="btn btn-sm btn-block btn-success"> Descargar</a></small>
                        </div>
                    </div>
                    </div>    
                      
    @endforeach

</div>
</div>



@endsection

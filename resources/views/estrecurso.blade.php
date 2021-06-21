@extends('layouts.landing')


@section('content')

    <div class="frame">

        <h1><b> Recurso Educativos Digitales Abiertos REDA</b></h1>
    
    </div>

<div class="frame">
<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach ($redas as $reda)

                               
                    <div class="col">
                    <div class="card">
                        <div class="card-header" style="background-color: #318004; color:white;">
                            {{$reda->categoria}} - REDA
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">{{$reda->titulo}}</h5>
                        <p class="card-text"> Area: {{$reda->area}}</p>
                        <p class="card-text"> {{$reda->descripcion}}</p>
                        </div>
                        @php
                            $ruta=$reda->ruta;
                            $path_ruta=substr($ruta,0,-4);
                        @endphp
                        <div class="card-footer">
                            <small class="text-muted"><a href="storage/zip/{{$path_ruta}}/{{$path_ruta}}" target="_blank" class="btn btn-sm btn-block btn-primary"> Ver más</a></small>
                        </div>
                    </div>
                    </div>    
                      
    @endforeach

</div>
</div>



@endsection

@extends('layouts.landing')


@section('content')

    <div class="frame">

        <h1><b> Biblioteca digital</b></h1>
    
    </div>

<div class="frame">
<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach ($libros as $libro)

                               
                    <div class="col">
                    <div class="card">
                        <div class="card-header" style="background-color: #9700ef; color:white;">
                            {{$libro->tema}}  - Libro
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">{{$libro->titulo}}</h5>
                        <p class="card-text"> {{$libro->resumen}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><a href="storage/biblioteca/{{$libro->file}}" target="_blank" class="btn btn-sm btn-block btn-success"> Ver libro</a></small>
                        </div>
                    </div>
                    </div>    
                      
    @endforeach

</div>
</div>



@endsection

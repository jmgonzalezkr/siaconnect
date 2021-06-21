@extends('layouts.landing')


@section('content')

<div class="frame">

    <h1><b> <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Servicios integrados de Aula</b></h1>
    
    </div>

<div class="frame">
<div class="row row-cols-1 row-cols-md-4 g-4">
    <div class="col">
      <div class="card">
        <div class="card-header" style="background-color: #318004; color:white;">
            Número de recursos REDA
          </div>
        <div class="card-body">
          <h5 class="card-title">Cantidad de Redas</h5>
          <p class="card-text">El número de recursos digitales abiertos almacenados en el repositorio es  de <br> <h3>{{$reda}}</h3> </p>
        </div>
        <div class="card-footer">
            <small class="text-muted"><a href="{{ route('estrecurso.recurso') }}" class="btn btn-sm btn-block btn-primary"> Ver más</a></small>
          </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-header" style="background-color: #ef6c00; color:white;">
            Número de Laboratorios
          </div>
        <div class="card-body">
          <h5 class="card-title">Cantidad de laboratorios</h5>
          <p class="card-text">El número de laboratorios almacenados en el repositorio es  de <br> <h3>{{$laboratorios}}</h3></p>
        </div>
        <div class="card-footer">
            <small class="text-muted"><a href="{{ route('estlaboratorio.laboratorio')}}" class="btn btn-sm btn-block btn-primary"> Ver más</a></small>
          </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-header" style="background-color: #9700ef; color:white;">
            Número de libros
          </div>
        <div class="card-body">
          <h5 class="card-title">Cantidad de libros</h5>
          <p class="card-text">El número de libros de la biblioteca almacenados en el repositorio es de: <br> <h3>{{$libros}}</h3></p>
        </div>
        <div class="card-footer">
            <small class="text-muted"><a href="{{ route('estbiblioteca.biblioteca') }}" class="btn btn-sm btn-block btn-primary"> Ver más</a></small>
          </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-header" style="background-color: #f0e008; color:black;">
            Número de archivos rápidos
          </div>
        <div class="card-body">
          <h5 class="card-title">Cantidad de archivos RR</h5>
          <p class="card-text">El número de archivos del repositorio rápido almacenados es de: <br> <h3>{{$archivos}}</h3></p>
        </div>
        <div class="card-footer">
            <small class="text-muted"><a href="{{ route('estrepositorio.rapido')}}" class="btn btn-sm btn-block btn-primary"> Ver más</a></small>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
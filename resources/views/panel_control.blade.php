@extends('layouts.dashboard')

@section('content')

<div class="frame">

<h1><b> <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Tablero de control</b></h1>

</div>

<div class="frame">
  <div class="card-group">
      <div class="card" style="max-width: 18rem;">

          <div class="card-header" style="background-color: #00a3ef; color:white;">
            Administración del Repositorio
          </div>

          <div class="card-body">
            <li class="list-group-item btn btn-info" style="text-align: left;"> <a href="{{ route('recurso.index') }}" class="btn btn-sm">Recursos digitales REDA</a> </li>
            <li class="list-group-item btn btn-info" style="text-align: left;"> <a href="{{ route('recurso.index') }}" class="btn btn-sm">Laborarios virtuales</a> </li>
            <li class="list-group-item btn btn-info" style="text-align: left;"> <a href="{{ route('biblioteca.index') }}" class="btn btn-sm">Biblioteca digital</a> </li>
            <li class="list-group-item btn btn-info" style="text-align: left;"> <a href="{{ route('home.index') }}" class="btn btn-sm">Repositorio rápido</a> </li>

          </div>

      </div> 

     
        <div class="card">
          <div class="card-header" style="background-color: #318004; color:white;">
            Número de recursos REDA
          </div>
          <div class="card-body">
            <h5 class="card-title">Cantidad de Redas</h5>
            <p class="card-text">El número de recursos digitales abiertos almacenados en el repositorio es  de <br> <h3>{{$reda}}</h3> </p>
          </div>
         
        </div>
        <div class="card">
          <div class="card-header" style="background-color: #ef6c00; color:white;">
            Número de Laboratorios
          </div>
          <div class="card-body">
            <h5 class="card-title">Cantidad de laboratorios</h5>
            <p class="card-text">El número de laboratorios almacenados en el repositorio es  de <br> <h3>{{$laboratorios}}</h3></p>
          </div>
         
        </div>
        <div class="card">
          <div class="card-header" style="background-color: #9700ef; color:white;">
            Número de libros
          </div>
          <div class="card-body">
            <h5 class="card-title">Cantidad de libros</h5>
            <p class="card-text">El número de libros de la biblioteca almacenados en el repositorio es de: <br> <h3>{{$libros}}</h3></p>
          </div>
          
        </div>
      </div>

</div>

<center>
    <strong>
        <span style="font-size: x-small;">
          <strong>
            <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/" rel="license">
              <img alt="Licencia Creative Commons" src="{{ asset('img/licencia.png')}}" />
            </a></strong>
          </span>
        </strong>
        <strong></strong>
        <p>
           <strong>
            <span style="font-size: x-small;">Esta obra esta licenciada bajo Creative Commons</span>
          </strong>
       </p>
</center>

<p style="margin-left: 30px; text-align: center;">&nbsp;<span style="font-size: x-small;"><em><strong>Programación</strong></em> Esto es una obra del área del <em><strong>Laboratorio de Software - HMO</strong></em>.</span></p>
<p style="margin-left: 30px; text-align: center;"><span style="font-size: x-small;">Este obra se encuentra bajo la licencia Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0) Ultima actualización 20 de junio de 2021</span></p>



@endsection

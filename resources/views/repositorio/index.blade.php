@extends('layouts.plantilla')


@section('title', 'Repositorio')


@section('content')


<div class="title">

    {{route('cargar.store')}}  
</div>


<div class="card">
 
  <div class="card-header">
    <h3 class="card-title"> Sistema de carga del Repositorio</h3>
    
    <div class="col-md-6">
      
      @include('repositorio.create')

    </div>

  </div>
  <div class="card-body">
  <div class="table-responsive">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre del archivo</th>
            <th scope="col">Abrir</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($directories as $directory)

              <tr>
                <th scope="row">1</th>
                @php
                   $resultado = substr($directory, 7);
                  
               @endphp
                <td>{{$resultado}}</td>
               
                <td><a href="storage/{{$resultado}}" class="btn btn-info"> Ver</a></td>
                <td>Eliminar</td>
              </tr>
              @endforeach


              @foreach ($files as $file)
              <tr>
               <th scope="row">1</th>
               @php
                   $resultado = substr($file, 7);
                  
               @endphp
                                
               <td>{{$resultado}}</td>
              
               <td><a href="storage/{{$resultado}}" class="btn btn-sm btn-info"> Ver</a></td>
               
               
               <td>
                <form action="{{route('cargar.destroy',$resultado)}}" method="POST">
                  @method('DELETE')
                  @csrf

                  <button  type="submit" class="btn btn-sm btn-warning">Eliminar</button>

                </form>



               </td>
                </tr>
              @endforeach
     
         
        </tbody>
      </table>
  </div>
</div>


</div>



@endsection
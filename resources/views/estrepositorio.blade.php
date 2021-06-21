@extends('layouts.landing')

@section('content')

<div class="frame">

  <h2>Repositorio rápido</h2>
  <form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <div class="col-lg-5">
    <label for=dirname>Nombre del profesor   </label>
    <input id=dirname type=text name=profesor value=""  class="form-control" required/>
      </div>
      <div class="col-lg-5">
    <label for=dirname>Nombre del estudiante  </label>
    <input id=dirname type=text name=estudiante value=""  class="form-control" required/>
     </div>
    </div>
    <div class="row">
      <div class="col-lg-5">
    <label for="dir"> Seleccione el archivo</label>
    <input type="file" name='file[]' multiple class="form-control" > 
     </div>
     <div class="col-lg-3">
      <label for="dir"> Recuerde seleccionar los archivos</label>
      <button type="submit" class="btn btn-primary">Guardar</button>
     </div>


     

    </div> 
   

    
  </form>

  @if(session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
        @endif

        @if(session('alert'))
      <div class="alert alert-warning">
        {{ session('alert') }}
      </div>
        @endif

</div>

<div class="frame">
@if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif

<div class="container-fluid px-4">
 

<div class="card" style="border: 1px solid #00c0ef;">

  <div class="card-header" style="background-color: #00c0ef; color:white;">
      <i class="fas fa-table me-1"></i>
      Subir archivos
  </div>
  
     
  <div class="card-body">
    <div class="col-md-6">
      
      

    </div>

     <div class="card-body">
      

      <table id="datatablesSimple">
          <thead>
              <tr>
                <th>Id</th>
                <th>Nombre del archivo</th>
                <th>Nombre del profesor</th>
                <th>Nombre del estudiante</th>
                <th>Fecha</th>
                <th>Ver archivo</th>
                
                  
              </tr>
          </thead>
          <tfoot>
              <tr>
                <th>Id</th>
                <th>Nombre del archivo</th>
                <th>Nombre del profesor</th>
                <th>Nombre del estudiante</th>
                <th>Fecha</th>
                <th>Ver archivo</th>
               
                  
              </tr>
          </tfoot>
          <tbody>

            @foreach ($files as $file)
            <tr>
                 <td scope="row">{{ $file->id}}</td>

                 <td>{{ $file->name}}</td>

                 <td>{{ $file->nombre_docente}}</td>

                 <td>{{ $file->nombre_estudiante}}</td>

                 <td>{{ $file->created_at}}</td>
                                                       
                 <td><a target="_blank" href="storage/{{Auth::id()}}/{{$file->name}}" class="btn btn-sm btn-success"> Ver</a></td>
                                                        
                
             </tr>
           @endforeach
              
            
         </tbody>
      </table>
  </div>
</div>
</div>
</div>

@endsection

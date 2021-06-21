@extends('layouts.dashboard')

@section('content')

<div class="frame">

  
    <h2>Administración de biblioteca</h2>
  

</div>


<div class="frame">
  @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <div class="card" style="border: 1px solid #00c0ef;">

    <div class="card-header" style="background-color: #00c0ef; color:white;">
      <i class="fas fa-table me-1"></i>
      Subir libro
    </div>
  
     
  <div class="card-body">
    <div class="col-md-6">
      
      @include('repositorio.add-book')

    </div>

     <div class="card-body">
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

      <table id="datatablesSimple">
          <thead>
              <tr>
                <th>Tipo</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Tema</th>
                <th>Abrir</th>
                <th>Eliminar</th>
                  
              </tr>
          </thead>
          <tfoot>
              <tr>
                <th>Tipo</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Tema</th>
                <th>Abrir</th>
                <th>Eliminar</th>
                  
              </tr>
          </tfoot>
          <tbody>

            @foreach ($libros as $libro)
            <tr>
                 <td scope="row"><i class="far fa-file-pdf"></i></td>

                 <td>{{ $libro->titulo}}</td>

                 <td>{{ $libro->autor}}</td>

                 <td>{{ $libro->tema}}</td>
                                                       
                 <td><a target="_blank" href="storage/biblioteca/{{$libro->file}}" class="btn btn-success btn-sm"> <i class="fas fa-arrow-down"></i> Ver</a></td>
                                      
                 <td>
                    <form action="{{route('biblioteca.destroy', $libro->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                                          
                  <button type="submit" class="btn btn-danger btn-sm"> <i class="far fa-trash-alt"></i> Eliminar</button>
                    </form>
                 </td>
             </tr>
           @endforeach
              
            
         </tbody>
      </table>
  </div>
</div>
</div>
    
  </div>

  
</div>
@endsection
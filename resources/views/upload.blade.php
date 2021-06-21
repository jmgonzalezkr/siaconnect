@extends('layouts.dashboard')

@section('content')


      <div class="frame">
        <h2>Administración de recurso REDA o laboratorio virtual</h2>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
      </div>


      <div class="frame">
              <div class="card" style="border: 1px solid #00c0ef;">

                  <div class="card-header" style="background-color: #00c0ef; color:white;">
                      <i class="fas fa-table me-1"></i>
                      Subir recurso
                  </div>

                      <div class="card-body">

                        <div class="col-md-6">
                          @include('repositorio.create')
                        </div>

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

                        <div class="card-body">
                          <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Nombre del recurso</th>
                                    <th>Abrir / descargar</th>
                                    <th>Descomprimir</th>
                                    <th>Eliminar</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <th>Tipo</th>
                                  <th>Nombre del recurso</th>
                                  <th>Abrir / descargar</th>
                                  <th>Descomprimir</th>
                                  <th>Eliminar</th>
                                    
                                </tr>
                            </tfoot>
                            <tbody>
                                
                              @foreach ($files as $file)
                                                  
                                                    @php
                                                        $name_path = substr($file, 11);
                                                      
                                                    @endphp

                                                      <tr>
                                                      <th scope="row"><i class="fas fa-file-archive"></i></th>
                                                                                                            
                                                      <td>{{$name_path}}</td>
                                                      
                                                      <td><a target="_blank" href="storage/zip/{{$name_path}}" class="btn btn-success btn-sm"><i class="fas fa-arrow-down"></i> Descargar</a></td>

                                                      <td>                                      
                                                        <form action="{{route('recurso.extract', $name_path)}}" method="POST">
                                                        
                                                        @csrf
                                                    
                                                        <button type="submit" class="btn btn-warning btn-sm"> <i class="far fa-file-archive"></i>  Descomprimir</button>
                                                      </form>   
                                                        
                                                      </td>
                                                      
                                                      <td>
                                                        @php
                                                        $name_path =substr($name_path, 0, -4);
                                                        @endphp

                                                          <form action="{{route('recurso.destroy', $name_path)}}" method="POST">
                                                              @method('DELETE')
                                                              @csrf
                                                          
                                                          <button type="submit" class="btn btn-danger btn-sm"> <i class="far fa-trash-alt"></i> Eliminar</button>
                                                          </form>

                                                      </td>
                          
                                                        </tr>
                                                      @endforeach



                                                        @foreach ($directories as $directory)

                                                        <tr>
                                                          <th scope="row"><i class="far fa-folder-open"></i></th>
                                                          @php
                                                            $resultado = substr($directory, 7);
                                                            $recurso =substr($resultado, 4);
                                                            
                                                        @endphp
                                                          

                                                          <td>
                                                            <form action="{{route('recurso-edit.edit', $recurso)}}" method="POST">
                                                            @csrf
                                                          
                                                          <button type="submit" class="btn btn-link btn-sm"> {{$recurso}}/ </button>
                                                          </form>
                                                            
                                                          </td>
                                                        
                                                          <td><a href="storage/{{$resultado}}/{{$recurso}}" class="btn btn-info btn-sm" target="_blank"> Visualizar</a></td>
                                                          
                                                            <td>
                                                              
                                                              
                                                            </td>

                                                            <td>
                                                              <form action="{{route('recurso.destroy', $recurso)}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                            
                                                            <button type="submit" class="btn btn-sm btn-danger"> <i class="far fa-trash-alt"></i> Eliminar</button>
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
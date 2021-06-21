@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar carpeta') }}</div>
                <a href="{{route('recurso.index')}}" class="btn btn-success"> <--- Regresar</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-6">
                
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

                        <div class="table-responsive">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Nombre del archivo</th>
                                  <th scope="col">editar</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                    $a = 0;
                                @endphp

                                @foreach ($files as $file)
                                
                                <tr>
                                   <td scope="row">
                                     
                                    <li class="file">

                                      @php
                                          
                                          $a = $a +1;
                                          echo $a;
                                      @endphp

                                    </li>
                                  
                                  </td>

                                   @php
                                          $file = substr($file,44);
                                                                                    
                                   @endphp

                                                                      
                                                                                        
                                   <td>{{$file}}</td>

                                                                    
                                   <td>
                                      @include('repositorio.rename')
      
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
    </div>
</div>
@endsection
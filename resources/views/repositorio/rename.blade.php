<!-- Button trigger modal -->
@php
$name_path=$file;                                          
@endphp
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rename{{$a}}">
    Renombrar archivo
 </button>
   
   <!-- Modal -->
   <div class="modal fade" id="rename{{$a}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Renombrar archivo</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
             <form action="{{route('renombrar.rename')}}" method="POST" enctype="multipart/form-data">
                 @csrf

                 <label for=dirname >Nombre original</label> <br>
                 <input id=dirname type=text name=path_name value="{{$name_path}}" class="form-control" readonly/> <br>
                                                
                     <label for=dirname >Nuevo nombre  </label>
                     <input id=dirname type=text name=rename value="{{$name_path}}" class="form-control" required/>
                                
                     
                   @if(session('message'))
                     <div class="alert alert-success">
                       {{ session('message') }}
                     </div>
                   @endif
                      
 
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Guardar</button>
                     </div>
             </form>
 
          </div>
                        
         </div>
 
         <script src="{{asset('js/popper.min.js')}}" ></script>
         <script src="{{asset('js/bootstrap.min.js')}}"></script>
 
         
 
     
 
 
       </div>
     </div>
   </div>
   
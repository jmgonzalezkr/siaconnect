<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearRecurso">
    <i class="fas fa-plus"> </i> Subir libro
  </button>
    
    <!-- Modal -->
    <div class="modal fade" id="crearRecurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Subir libro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{route('biblioteca.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                 
                      <label for=dirname >Nombre del libro   </label>
                      <input id=dirname type=text name=titulo value="" class="form-control" required/>
                   
                      <label for=dirname>Autor   </label>
                      <input id=dirname type=text name=autor value=""  class="form-control" required/>
                   
                      <label for=dirname>Tema   </label>
                      <input id=dirname type=text name=tema value=""  class="form-control" required/>
                                                          
                       <label for=dirname>Resumen   </label>
                       <input id=dirname type=text name=resumen value="" class="form-control" required/>
                
                      <label for=dirname>Cargar archivo PDF  </label>
                      <input type="file" name='file' class="form-control" required> 
                      
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
  
  
  
          
  
      
  
  
        </div>
      </div>
    </div>
    
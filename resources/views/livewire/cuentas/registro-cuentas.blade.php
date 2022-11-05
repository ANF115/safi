<div>
<div >
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
           

           
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
        </head>
    
            <br>
            <div class="container">
                <div class="row g-3">
                    <h2>Cuentas </h2>
                   
                    <div class="col-sm">
                        <select class="form-select" aria-label="Default select example" wire:model="cuenta_mayor_id">
                            <option value="">Cuenta Mayor </option>
                                @foreach ($cuentasmay as $cuentam)
                                    <option value="{{ $cuentam->id }}">
                                        {{ $cuentam->nombre_cuenta_mayor }}

                            </option>
                                @endforeach
                        </select>
                        @error('cuenta_mayor_id') <span class="mt-1 error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-sm">
                        
                        <input type="text" class="form-control" id="codigo_cuenta" placeholder="Código Cuenta "  wire:model="codigo_cuenta">
                        @error('codigo_cuenta') <span class="mt-1 error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-sm" >
                        
                        <input type="text" class="form-control" id="nombre_cuenta" placeholder="Nombre Cuenta"  wire:model="nombre_cuenta">
                        @error('nombre_cuenta') <span class="mt-1 error">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="col-auto">
                        <button type="button" class="btn btn-success"  wire:click="save()">Guardar</button>
                    </div>
                </div>
                <br>
                <div class="col-sm">
                            <input type="text" class="form-control" placeholder="Search" wire:model="search">
                </div>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                        
                            <th scope="col">Código Cuenta Mayor</th>
                            <th scope="col">Nombre Cuenta Mayor</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
           

                    <tbody>
                        @foreach ($cuentass as $value)
                        
                            <tr>
                                    
                                    <td>{{ $value->codigo_cuenta }}</td>
                                    <td>{{ $value->nombre_cuenta }}</td>
                                    <td>{{ $value->cuenta_mayor->codigo_cuenta_mayor }}</td>
                                    <td>{{ $value->cuenta_mayor->nombre_cuenta_mayor }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" id="btn-editar"

                                            data-bs-toggle="modal" data-bs-target="#editarModal"
                                            wire:click="edit({{ $value->id }})">Editar</button>
                                        <button type="button" class="btn btn-danger" id="btn-eliminar"
                                            data-bs-toggle="modal" data-bs-target="#eliminarModal"
                                            wire:click="delete({{ $value->id  }})">Eliminar</button>
                                    </td>

                            </tr>
                        @endforeach   


                    </tbody>
                 </table>
                 {{ $cuentas->links() }}
         
                
            
        

        </div>
        <br>
        <br>
        <div class="container">
             <div class="row g-3">
                <div class="col-sm">
                        <a href="{{ route('cuentasMay') }}" type="button" class="btn btn-success" >Regresar</a>
                        
                </div>
                <div class="col-auto">
                        <a href="{{ route('subcuentas') }}" type="button" class="btn btn-success " >Siguiente</a>
                </div>
                
             </div>
        </div>
        {{-- MODAL --}}
        <div wire:ignore.self class="modal fade" id="editarModal"  tabindex="-1" role="dialog"
        aria-labelledby="editarModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">Editando</h5>
                        <button type="button" class="close"data-bs-dismiss="modal"  aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            
                            <div class="form-group">
                                <label for="cuentam">Código Cuenta </label>
                                <input type="text" class="form-control" id="edit_codigo_cuenta" placeholder="Código Cuenta" wire:model="edit_codigo_cuenta" >
                                @error('edit_codigo_cuenta') <span class="mt-1 error">{{ $message }}</span> @enderror
                            </div>
                            <br>
                            
                            <div class="form-group">
                                <label for="cuentam">Nombre Cuenta </label>
                                <input type="text" class="form-control" id="edit_nombre_cuenta" placeholder="Nombre Cuenta " wire:model="edit_nombre_cuenta" >
                                @error('edit_nombre_cuenta') <span class="mt-1 error">{{ $message }}</span> @enderror
                            </div>
                            <br>
                            
                            <div class="form-group">
                            <label for="cuentam">Cuenta Mayor </label>
                            <br>
                            <br>
                                <select name="cuentam" id="edit_cuenta_mayor_id" wire:model="edit_cuenta_mayor_id">
                                    
                                    @foreach ($cuentasmay as $cuentam)
                                        <option value="{{$cuentam->id}}" 
                                            @foreach ($cuentass as $cuenta)
                                                @if ($cuenta->cuenta_mayor_id == $cuentam->id)
                                                {{'selected="selected"'}}
                                                @endif 
                                            @endforeach >
                                            {{ $cuentam->nombre_cuenta_mayor }} 
                                        </option>               
                                    @endforeach
                                </select>
                                @error('edit_cuenta_mayor_id') <span class="mt-1 error">{{ $message }}</span> @enderror
                            <br>
                             
                        </div>
                            {{-- <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                    </div> --}}
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" wire:click="save_edit()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="eliminarModal" tabindex="-1" role="dialog"
        aria-labelledby="eliminarModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminarModalLabel">Delete Confirm</h5>
                        <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn"data-bs-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="delete_now()" class="btn btn-danger close-modal"
                        data-bs-dismiss="modal">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </div>
    
    
    @if(Session::has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Felicidades!',
                text: '{{ Session::get("success") }}'
            })
        </script>
    @endif
</div>
<style>
        .content-centrado {
        background-color: #fafafa;
        margin: 1rem;
        padding: 1rem;
        /* border: 2px solid #ccc; */
        /* IMPORTANTE */
        text-align: center;
    }

    .campo:last-child {
        justify-content: flex-end;
    }

    .form-control {
        color: black;
    }
    .error{
        color: red;
    }
</style>

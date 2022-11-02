<div>
    <div >
            <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">    
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.1.slim.js"integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk="crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
        <script>
            $(document).on('click','#btn-editar',function(){

                $('#editarModal').modal('show')
            })
        </script>
        <script>
            $(document).on('click','#btn-eliminar',function(){

                $('#eliminarModal').modal('show')
            })
        </script>        
            </head>
        
                <br>
                <div class="container">
                    <div class="row g-3">
                        <h2>SubCuentas </h2>
                    
                        <div class="col-sm">
                        <select class="form-select" aria-label="Default select example" wire:model="cuenta_id">
                            <option value="">Cuenta </option>
                                @foreach ($cuentas as $cuenta)
                                    <option value="{{ $cuenta->id }}">
                                        {{ $cuenta->nombre_cuenta }}

                            </option>
                                @endforeach
                        </select>
                        </div>
                        <div class="col-sm">
                            
                            <input type="text" class="form-control" id="codigo_subcuenta" placeholder="Código SubCuenta "  wire:model="codigo_subcuenta">
                            @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-sm" >
                            
                            <input type="text" class="form-control" id="nombre_subcuenta" placeholder="Nombre SubCuenta"  wire:model="nombre_subcuenta">
                            @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
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
                            
                                <th scope="col">Código Cuenta</th>
                                <th scope="col">Nombre Cuenta</th>
                                <th scope="col">Acciones</th>

                            </tr>
                        </thead>
            

                        <tbody>
                            @foreach ($subcuentas as  $value)
                            
                                <tr>
                                        
                                        <td>{{ $value->codigo_subcuenta }}</td>
                                        <td>{{ $value->nombre_subcuenta }}</td>
                                        <td>{{ $value->cuenta->codigo_cuenta }}</td>
                                        <td>{{ $value->cuenta->nombre_cuenta }}</td>
                                        <td>
                                        <button type="button" class="btn btn-primary" id="btn-editar" data-toggle="modal"
                                            data-target="#editarModal" data-whatever="@mdo"
                                            wire:click="edit({{ $value->id }})">Editar</button>

                                        <button type="button" class="btn btn-danger" id="btn-eliminar" data-toggle="modal"
                                        data-target="#eliminarModal"
                                        wire:click="delete({{ $value->id  }})">Eliminar</button>
                                    </td>

                                </tr>
                            @endforeach   


                        </tbody>
                    </table>
            
                    
                
            

            </div>
            <div class="container">
                <div class="row g-3">
                    <div class="col-sm">
                            <a href="{{ route('cuentas') }}" type="button" class="btn btn-success" >Regresar</a>
                            
                    </div>
                    <div class="col-auto">
                            <a href="{{ route('dashboard') }}" type="button" class="btn btn-success " >Siguiente</a>
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
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="edit_codigo_subcuenta" placeholder="Código SubCuenta" wire:model="edit_codigo_subcuenta" >
                                    @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="edit_nombre_subcuenta" placeholder="Nombre SubCuenta" wire:model="edit_nombre_subcuenta" >
                                    @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                <label for="cuentam">Cuenta</label>
                                <br>
                                <br>
                                <select name="cuenta" id="edit_cuenta" wire:model="edit_cuenta_id">
                                    
                                    @foreach ($cuentas as $cuenta)
                                        <option value="{{$cuenta->id}}" 
                                            @foreach ($subcuentass as $subcuenta)
                                                @if ($subcuenta->cuenta_id == $cuenta->id)
                                                {{'selected="selected"'}}
                                                @endif 
                                            @endforeach >
                                            {{ $cuenta->nombre_cuenta }} 
                                        </option>               
                                    @endforeach
                                </select>
                                <br>
                                
                            </div>
                                {{-- <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                        </div> --}}
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" wire:click="save_edit()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true close-btn">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                            <button type="button" wire:click.prevent="delete_now()" class="btn btn-danger close-modal"
                                data-dismiss="modal">Yes, Delete</button>
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
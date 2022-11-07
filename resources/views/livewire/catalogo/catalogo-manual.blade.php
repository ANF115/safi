<div >
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        
    </head>
    <body>
    <br>
    <div class="container">
        <div class="row g-3">
            <h1>Registro de Catálogo</h1>
            <div class="col-sm">
            <select class="form-select" aria-label="Default select example" wire:model="empresa_id">
                <option value="">Empresa</option>
                    @foreach ($usuarios as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->nombre_empresa }}

                        </option>
                    @endforeach
            </select>
            </div>
            <div class="col-sm">
                
                <input type="text" class="form-control" id="nombre" placeholder="Nombre Catálogo"  wire:model="nombre_catalogo">
                @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
                <br>
                
            </div>
            <div class="col-sm">
                <button type="button" class="btn btn-success "  wire:click="save_cata()">Guardar</button>
            </div>
            
        
        </div>
        <br>
    </div>
    <div class="container">
        <div class="row g-3">
            <h2>Cuentas Mayor</h2>
            <div class="col-sm">
            <select class="form-select" aria-label="Default select example" wire:model="catalogo_id">
                <option value="">Catálogo</option>
                    @foreach ($catalogos as $catalogo)
                        <option value="{{ $catalogo->id }}">
                            {{ $catalogo->nombre_catalogo }}

                        </option>
                    @endforeach
            </select>
            </div>
            <div class="col-sm">
                
                <input type="text" class="form-control" id="codigo_cm" placeholder="ID Cuenta Mayor"  wire:model="codigo_cuenta_mayor">
                @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
            </div>
            <div class="col-sm" >
                
                <input type="text" class="form-control" id="nombre_mayor" placeholder="Nombre"  wire:model="nombre_cuenta_mayor">
                @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
            </div>
            
            <div class="col-auto">
                <button type="button" class="btn btn-success"  wire:click="save_CM()">Guardar</button>
            </div>
        </div>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Catálogo ID</th>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
           

            <tbody>
                @foreach ($cuentasmay as $key => $value)
                 
                    <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $value->catalogo_id }}</td>
                            <td>{{ $value->codigo_cuenta_mayor }}</td>
                            <td>{{ $value->nombre_cuenta_mayor }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal1" wire:click="edit_cm({{ $value->id }})">
                                            Editar</button>

                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modal2"
                                            wire:click="delete_cm({{ $value->id  }})">Eliminar</button>
                            </td>

                    </tr>
                @endforeach
                


            </tbody>
        </table>
        
        
       

    </div>



    <div class="container">
        <div class="row g-3">
            <h2>Cuentas </h2>
            <div class="col-sm">
                
                <input type="text" class="form-control" id="codigo" placeholder="Código">
            </div>
            <div class="col-sm" >
               
                <input type="text" class="form-control" id="nombre_mayor" placeholder="Nombre">
            </div>
            
            <div class="col-sm">
            <select class="form-select" aria-label="Default select example" wire:model="cuenta_mayor_id">
                <option value="">Cuenta Mayor</option>
                        @foreach ($cuentas as $cuenta)
                            <option value="{{ $cuenta->id }}">
                                {{ $cuenta->nombre_cuenta_mayor }}

                            </option>
                        @endforeach
            </select>
            </div>

            <div class="col-auto">
                <button type="button" class="btn btn-success">Guardar</button>
            </div>
        </div>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                   
                    <th scope="col">Cuenta Mayor</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
           

            <tbody>
                @foreach ($cuentas as $key => $value)
                 
                    <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $value->codigo_cuenta }}</td>
                            <td>{{ $value->nombre_cuenta }}</td>
                            <td>{{ $value->cuenta_mayor_id }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal3" wire:click="">
                                            Editar</button>

                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modal4"
                                            wire:click="">Eliminar</button>
                            </td>

                    </tr>
                @endforeach   


            </tbody>
        </table>
       

    </div>

    <div class="container">
        <div class="row g-3">
            <h2>SubCuentas </h2>
            <div class="col-sm">
                
                <input type="text" class="form-control" id="codigo" placeholder="Código">
            </div>
            <div class="col-sm" >
               
                <input type="text" class="form-control" id="nombre_mayor" placeholder="Nombre">
            </div>
            
            <div class="col-sm">
            <select class="form-select" aria-label="Default select example" wire:model="cuenta_id">
                <option value="">Cuenta</option>
                        @foreach ($cuentas as $cuenta)
                            <option value="{{ $cuenta->id }}">
                                {{ $cuenta->nombre_subcuenta }}

                            </option>
                        @endforeach
            </select>
            </div>

            <div class="col-auto">
                <button type="button" class="btn btn-success">Guardar</button>
            </div>
        </div>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>

                    <th scope="col">Cuenta</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
           

            <tbody>
             @foreach ($subcuentas as $key => $value)
                 
                    <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $value->codigo_subcuenta }}</td>
                            <td>{{ $value->nombre_subcuenta }}</td>
                            <td>{{ $value->cuenta_id }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal5" wire:click="">
                                            Editar</button>

                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modal6"
                                            wire:click="">Eliminar</button>
                            </td>

                    </tr>
            @endforeach   
                


            </tbody>
        </table>
       

    </div>
    {{-- MODAL --}}
    <div class="modal fade" id="modal1" wire:ignore.self tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editando</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        
                        <div class="form-group">
                            
                            <input type="text" class="form-control" id="codigo_cm" placeholder="ID Cuenta Mayor" wire:model="codigo_cuenta_mayor" >
                             @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            
                            <input type="text" class="form-control" id="nombreCM" placeholder="Nombre Cuenta Mayor" wire:model="nombre_cuenta_mayor" >
                             @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
                        </div>
                        {{-- <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="save_edit_cm()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal2" tabindex="-1" role="dialog"
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
                    <button type="button" wire:click.prevent="delete_now_cm()" class="btn btn-danger close-modal"
                        data-dismiss="modal">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="modal3" wire:ignore.self tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editando</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        
                        <div class="form-group">
                            
                            <input type="text" class="form-control" id="codigo_c" placeholder="Codigo Cuenta" wire:model="codigo_cuenta" >
                             @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            
                            <input type="text" class="form-control" id="nombreC" placeholder="Nombre Cuenta" wire:model="nombre_cuenta" >
                             @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="cuentam">Cuenta Mayor </label>
                            <br>
                            <select name="cuentam" id="cuenm" wire:model="cuenta_mayor_id">
                                
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
                    <button type="button" class="btn btn-primary" wire:click="save_edit_c()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal4" tabindex="-1" role="dialog"
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
                    <button type="button" wire:click.prevent="delete_now_c()" class="btn btn-danger close-modal"
                        data-dismiss="modal">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="modal5" wire:ignore.self tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editando</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        
                        <div class="form-group">
                            
                            <input type="text" class="form-control" id="codigo_sc" placeholder="Código SubCuenta" wire:model="codigo_subcuenta" >
                             @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            
                            <input type="text" class="form-control" id="nombreSC" placeholder="Nombre SubCuenta" wire:model="nombre_subcuenta" >
                             @error('name') <span class="mt-1 error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="cuenta">Cuenta </label>
                            <br>
                            <select name="cuenta" id="cuenta" wire:model="cuenta_id">
                                
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
                    <button type="button" class="btn btn-primary" wire:click="save_edit_sc()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal6" tabindex="-1" role="dialog"
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
                    <button type="button" wire:click.prevent="delete_now_sc()" class="btn btn-danger close-modal"
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


    </body>
    
    
    
    
    
    
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



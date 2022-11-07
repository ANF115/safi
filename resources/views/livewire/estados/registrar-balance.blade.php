<div>
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
    <body>
        <br>
        <div class="container">
            <div class="row g-3">
                <h1>Balance General</h1>
                <!--<div class="col-sm">
                   
                        <select class="form-select" aria-label="Default select example" id="periodo_id_4" wire:model="periodo_id_4">
                            <option value="">Periodo</option>
                                @foreach ($periodos as $per)
                                    <option value="{{ $per->id }}">
                                        {{ $per->year }}

                            </option>
                                    @endforeach
                                
                        </select>
                        @error('periodo_id_4') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>-->
            </div>
            <br>
            <div class="row g-3">
                <div class="col-sm">
                   
                        <select class="form-select" aria-label="Default select example" id="periodo_id_3" wire:model="periodo_id_3">
                            <option value="">Periodo</option>
                                @foreach ($periodos as $per)
                                    <option value="{{ $per->id }}">
                                        {{ $per->year }}

                            </option>
                                    @endforeach
                                
                        </select>
                        @error('periodo_id_3') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
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
                <div class="col-auto">
                    <button type="button" class="btn btn-success" wire:click="save_cuenta_mayor()">Agregar</button>
                </div>
            </div>
            <br>
            <br>
            <div class="row g-3">
                <div class="col-sm">
                   
                        <select class="form-select" aria-label="Default select example" id="periodo_id_1" wire:model="periodo_id_1">
                            <option value="">Periodo</option>
                                @foreach ($periodos as $per)
                                    <option value="{{ $per->id }}">
                                        {{ $per->year }}

                            </option>
                                    @endforeach
                                
                        </select>
                        @error('periodo_id_1') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                <div class="col-sm" >
                    
                    <select class="form-select" aria-label="Default select example" id="cuenta_id" wire:model="cuenta_id">
                                <option value="">Cuenta </option>
                                @foreach ($cuentasmay as $cm)
                                        @foreach ($cuentas as $cuenta)
                                            @if($cm->id == $cuenta->cuenta_mayor_id)
                                                <option value="{{ $cuenta->id }}">
                                                    {{ $cuenta->nombre_cuenta }}
                                            @endif

                                </option>
                                        @endforeach
                                @endforeach
                    </select>
                        @error('cuenta_id') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                
                <div class="col-sm">
                    
                    <input type="numeric" class="form-control" id="valor1" placeholder="Valor" wire:model="valor1">
                    @error('valor1') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-success" wire:click="save_cuenta()">Agregar</button>
                </div>
            </div>
            <br>
            <br>
            <div class="row g-3">
                <div class="col-sm">
                        
                        <select class="form-select" aria-label="Default select example" id="periodo_id_2" wire:model="periodo_id_2">
                            <option value="">Periodo</option>
                                @foreach ($periodos as $per)
                                    <option value="{{ $per->id }}">
                                        {{ $per->year }}

                            </option>
                                    @endforeach
                                
                        </select>
                        @error('periodo_id_2') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                
                <div class="col-sm" >
                    <select class="form-select" aria-label="Default select example" id="subcuenta_id" wire:model="subcuenta_id">
                                <option value="">Subcuenta</option>
                                @foreach ($cuentasmay as $cm)
                                        @foreach ($cuentas as $cuenta)
                                             @foreach ($subcuentas as  $sub)
                                                @if($cm->id == $cuenta->cuenta_mayor_id && $cuenta->id == $sub->cuenta_id)
                                                    <option value="{{ $sub->id }}">
                                                        {{ $sub->nombre_subcuenta }}
                                                @endif

                                </option>
                                            @endforeach
                                        @endforeach
                                @endforeach
                    </select>   
                    @error('subcuenta_id') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                
                <div class="col-sm">
                    
                    <input type="numeric" class="form-control" id="valor2" placeholder="Valor"  wire:model="valor2">
                    @error('valor2') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-success"  wire:click="save_subcuenta()">Agregar</button>
                </div>
            </div>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        
                        <th scope="col">Nombre Cuenta</th>
                        <th scope="col">$</th>
                        <th scope="col">Editar Valor</th>
                       


                    </tr>
                </thead>
            

                <tbody>
                 
                        @foreach ($periodoss as $prs)
                            @foreach ($periodos_CM as $pcm)
                                <tr>
                                    @if($prs->id == $pcm->periodo_id)
                                        <td><b>{{$pcm->cuenta_mayor->nombre_cuenta_mayor}}</b></td>
                                        <td></td>
                                        <td>
                                                <button type="button" class="btn btn-primary" id="btn-editar"
                                                data-bs-toggle="modal" data-bs-target="#editarModalCuenta"
                                                wire:click="edit_cuenta({{ $pcuenta->id }})">Total</button>
                                        </td>
                                        <!--<td>
                                            @if($pcm->cuenta_mayor->nombre_cuenta_mayor == 'ACTIVOS')
                                            
                                            @endif
                                            @if($pcm->cuenta_mayor->nombre_cuenta_mayor == 'PASIVOS')
                                            <label for="message-text" class="col-form-label">{{$totalpasivos}}</label>
                                            @endif
                                            @if($pcm->cuenta_mayor->nombre_cuenta_mayor == 'CAPITAL')
                                                
                                            @endif
                                        </td>-->
                                    @endif
                                </tr>
                                
                                @foreach ($periodos_cuentas as $pcuenta)
                                    <tr>
                                        
                                        @if($pcm->cuenta_mayor_id == $pcuenta->cuenta->cuenta_mayor_id && $prs->id == $pcuenta->periodo_id && $prs->id == $pcm->periodo_id)
                                            <td>{{$pcuenta->cuenta->nombre_cuenta}}</td>
                                            <td>{{$pcuenta->valor}}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="btn-editar"
                                                    data-bs-toggle="modal" data-bs-target="#editarModalCuenta"
                                                    wire:click="edit_cuenta({{ $pcuenta->id }})">Editar</button>
                                            </td>
                                           <!-- <td>
                                                    @if($pcuenta->cuenta->nombre_cuenta == 'ACTIVOS CORRIENTES')

                                                        <button type="button" class="btn btn-success" id="btn-editar"
                                                        data-bs-toggle="modal" data-bs-target="#editarModalCuenta"
                                                        wire:click="total_activos_corrientes()">Total</button>

                                                    @endif
                                                    @if($pcuenta->cuenta->nombre_cuenta == 'ACTIVOS NO CORRIENTES')
                                                        <button type="button" class="btn btn-success" id="btn-editar"
                                                        data-bs-toggle="modal" data-bs-target="#editarModalCuenta"
                                                        wire:click="total_activos_noco()">Total</button>
                                                    @endif

                                                    @if($pcuenta->cuenta->nombre_cuenta == 'PASIVOS CORRIENTES')
                                                        <button type="button" class="btn btn-success" id="btn-editar"
                                                        data-bs-toggle="modal" data-bs-target="#editarModalCuenta"
                                                        wire:click="total_pasivos_corrientes()">Total</button>
                                                    @endif
                                                    @if($pcuenta->cuenta->nombre_cuenta == 'PASIVOS NO CORRIENTES')
                                                        <button type="button" class="btn btn-success" id="btn-editar"
                                                        data-bs-toggle="modal" data-bs-target="#editarModalCuenta"
                                                        wire:click="total_pasivos_corrientes()">Total</button>
                                                    @endif
                                                    
                                            </td>-->

                                        @endif
                                    </tr>
                                    @foreach ($periodos_subcuentas as  $psub)
                                        <tr>
                                            @if($pcm->cuenta_mayor_id == $pcuenta->cuenta->cuenta_mayor_id && $pcuenta->cuenta->id == $psub->subcuenta->cuenta_id && $prs->id == $psub->periodo_id && $prs->id == $pcm->periodo_id )
                                                <td>{{$psub->subcuenta->nombre_subcuenta}}</td>
                                                <td>{{$psub->valor}}</td>
                                                <td>
                                                <button type="button" class="btn btn-primary" id="btn-editar"
                                                    data-bs-toggle="modal" data-bs-target="#editarModalSubcuenta"
                                                    wire:click="edit_subcuenta({{ $psub->id }})">Editar</button>
                                                </td>
                                                
                                                
                                            @endif
                                        </tr>
                                    @endforeach

                                @endforeach

                            @endforeach
                        @endforeach
                        

                    
                    


                </tbody>
            </table>

            
        

        </div>
        <div class="container">
             <div class="row g-3">
                <div class="col-sm">
                        <a href="{{ route('registrarER') }}" type="button" class="btn btn-success " >Siguiente</a>
                </div>
             </div>
        </div>
        <br>
        <br>
        {{-- MODAL --}}
            <div wire:ignore.self class="modal fade" id="editarModalCuenta"  tabindex="-1" role="dialog"
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
                                    <label for="edit_valor1">Valor</label>
                                    <br>
                                    <input type="numeric" class="form-control" id="edit_valor1"  wire:model="edit_valor1" >
                                    @error('edit_valor1') <span class="mt-1 error">{{ $message }}</span> @enderror
                                </div>
                                <br>
                                
                                
                                {{-- <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                        </div> --}}
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" wire:click="save_edit_cuenta()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MODAL --}}
            <div wire:ignore.self class="modal fade" id="totalModalCM"  tabindex="-1" role="dialog"
            aria-labelledby="editarModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarModalLabel">Total</h5>
                            <button type="button" class="close"data-bs-dismiss="modal"  aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="totalcm">Valor</label>
                                    <br>
                                    <input type="numeric" class="form-control" id="totalcm">
                                   
                                </div>
                                <br>
                                
                                
                                {{-- <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                        </div> --}}
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" wire:click="save_edit_cuenta()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>


            {{-- MODAL --}}
            <div wire:ignore.self class="modal fade" id="editarModalSubcuenta"  tabindex="-1" role="dialog"
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
                                    <label for="cuentam">Valor</label>
                                    <br>
                                    <input type="numeric" class="form-control" id="edit_valor2"  wire:model="edit_valor2" >
                                    @error('edit_valor2') <span class="mt-1 error">{{ $message }}</span> @enderror
                                </div>
                                <br>
                                
                                {{-- <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                        </div> --}}
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" wire:click="save_edit_subcuenta()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
    </body>
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

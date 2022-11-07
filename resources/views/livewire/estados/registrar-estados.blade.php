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
                <h1>Registro de Período Contable</h1>
                <div class="col-sm">
                    
                    <input type="text" class="form-control" id="año" placeholder="Año" wire:model="year">
                    <br>
                    @error('year') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                <div class="col-sm">
                    
                    <input type="date" class="form-control" id="año" placeholder="Fecha Inicio"  wire:model="fecha_inicio">
                    <br>
                    @error('fecha_inicio') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                <div class="col-sm">
                    
                    <input type="date" class="form-control" id="año" placeholder="Fecha Fin" wire:model="fecha_fin">
                    <br>
                    @error('fecha_fin') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-success "wire:click="save_periodo()">Guardar</button>
                </div>
                
            
            </div>
        <br>
        </div>
        <div class="container">
            <div class="row g-3">
                <h2>Balance General</h2>
                <div class="col-sm" >
                    
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Cuenta</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                
                <div class="col-sm">
                    
                    <input type="text" class="form-control" id="valor" placeholder="Valor">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-success">Agregar</button>
                </div>
            </div>
            <br>
            <br>
            <div class="row g-3">
                
                <div class="col-sm" >
                    
                    <select class="form-select" aria-label="Default select example">
                        <option selected>SubCuenta</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                
                <div class="col-sm">
                    
                    <input type="text" class="form-control" id="valor" placeholder="Valor">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-success">Agregar</button>
                </div>
            </div>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        
                        <th scope="col">Nombre Cuenta</th>
                        <th scope="col">$</th>

                    </tr>
                </thead>
            

                <tbody>
                    @foreach ($cuentasmay as $cm)
                        <tr>
                                <td><b>{{$cm->nombre_cuenta_mayor}}</b></td>
                                <td></td>
                        </tr>
                        @foreach ($cuentas as $cuenta)
                            <tr>
                                @if($cm->id == $cuenta->cuenta_mayor_id)
                                    <td>{{$cuenta->nombre_cuenta}}</td>
                                    <td></td>
                                @endif
                            </tr>
                            @foreach ($subcuentas as  $sub)
                                <tr>
                                     @if($cm->id == $cuenta->cuenta_mayor_id && $cuenta->id == $sub->cuenta_id)
                                        <td>{{$sub->nombre_subcuenta}}</td>
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach

                        @endforeach



                    @endforeach

                    
                    


                </tbody>
            </table>

            
        

        </div>
        <br>
        <div class="container">
            <div class="row g-3">
                <h2>Estado de Perdidas y Ganancias</h2>
                <div class="col-sm" >
                    
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Cuenta</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-sm">
                    
                    <input type="text" class="form-control" id="valor" placeholder="Valor">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-success">Agregar</button>
                </div>
            </div>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        
                        <th scope="col">Nombre</th>
                        <th scope="col">Código</th>
                        <th scope="col">Cuenta Mayor</th>
                        <th scope="col">Cuenta</th>
                        
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
            

                <tbody>
                    
                    <tr>
                            
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal2" wire:click="">
                                            Editar</button>

                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal3"
                                            wire:click="">Eliminar</button>
                            </td>

                    </tr>
                    


                </tbody>
            </table>
           
        

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

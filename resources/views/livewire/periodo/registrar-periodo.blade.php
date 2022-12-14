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
                <br>
                <br>
                <div class="col-sm">
                    <br>
                    
                    <input type="text" class="form-control" id="año" placeholder="Año" wire:model="year">
                    <br>
                    @error('year') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                <div class="col-sm">
                    <label for="fecha_inicio">Fecha Inicio </label>
                    <input type="date" class="form-control" id="fecha_inicio" placeholder="Fecha Inicio"  wire:model="fecha_inicio">
                    <br>
                    @error('fecha_inicio') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                <div class="col-sm">
                    <label for="fecha_fin">Fecha Fin</label>
                    <input type="date" class="form-control" id="fecha_fin" placeholder="Fecha Fin" wire:model="fecha_fin">
                    <br>
                    @error('fecha_fin') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>
                <div class="col-sm">
                    <br>
                        <select class="form-select" aria-label="Default select example" wire:model="catalogo_id">
                            <option value="">Catálogo</option>
                                
                                    <option value="{{ $catalogos->id }}">
                                        {{ $catalogos->nombre_catalogo }}

                                    </option>
                                
                        </select>
                        @error('catalogo_id') <span class="mt-1 error">{{ $message }}</span> @enderror
                </div>

                <div class="col-sm">
                    <br>
                    <button type="button" class="btn btn-success "wire:click="save_periodo()">Guardar</button>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"># Periodo</th>
                            <th scope="col">Año</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Fecha Fin</th>
                            <th scope="col">Catálogo</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                     
                            @foreach ($periodoss as $key => $per)
                                
                                    <tr>
                                       
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $per->year }}</td>
                                                <td>{{ $per->fecha_inicio }}</td>
                                                <td>{{ $per->fecha_fin }}</td>
                                                <td>{{ $per->catalogo->nombre_catalogo }}</td>
                                           
                                       

                                    </tr>
                                
                               
                            @endforeach
                        
                       
                    </tbody>
                </table>
                {{ $periodos->links() }}
            
            </div>
        </div>
        <div class="container">
             <div class="row g-3">
                <div class="col-sm">
                        <a href="{{ route('registrarBalance') }}" type="button" class="btn btn-success " >Siguiente</a>
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


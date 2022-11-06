<div class="container-md">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    </head><br>
    <h1>Cargar Estados Financieros</h1><br>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="{{url('/downloads/EstadosFinancieros.xlsx')}}" download="EstadosFinancieros.xlsx" style="background-color:#5BA0FF; border:none" class="btn btn-primary">
            <div class="container text-center">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
                        <span style="font-size:40px; margin-top:8px" class="material-symbols-outlined">
                            cloud_download
                        </span>
                    </div>
                    <div class="col-md-auto">
                        <h5 style="color:white">Descargar Formatos<br>Estados Financieros</h5>
                    </div>
                </div>
            </div>
        </a><br>
        <form wire:submit.prevent="save">
        <div class="input-group input-group-sm mb-3">
            <input wire:model="periodo" type="number" placeholder="Año" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            @error('periodo') <div class="error" >{{ $message }}</div> @enderror
           
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
        <div class="mb-3">
            <label for="estadosFinancieros" class="form-label">Seleccionar Estados Financieros
                <input type="file" wire:model="estadosFinancieros" class="form-control" accept=".xlsx" id="cargarEstadosFinancieros">
            </label>
            <div wire:loading wire:target="estadosFinancieros" class="valid-feedback fs-4">Cargando...</div>
            @error('estadosFinancieros') <div class="error" >{{ $message }}</div> @enderror
        </div>
        <!-- <div class="card border-primary" style="border-style:dashed;" onclick="$('#cargarEstadosFinancieros').click()">
            <div class="card-body">
                <div class="container text-center"> -->
                    <!-- <label for="cargarEstadosFinancieros">
                        <div class="row justify-content-md-center">
                            <div class="col col-lg-2">
                                <span style="font-size:40px; margin-top:8px" class="material-symbols-outlined">
                                    cloud_upload
                                </span>
                            </div>
                            <div class="col-md-auto d-flex align-items-center">
                                <span id="mensajeCargarArchivo">Seleccione los estados financieros</span>
                                <input type="file" wire:model="estadosFinancieros" accept=".xlsx" style="display:none" id="cargarEstadosFinancieros">
                                <div wire:loading wire:target="estadosFinancieros">Cargando...</div>
                                @error('estadosFinancieros') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </label> -->
                <!-- </div>
            </div>
        </div>  -->
        <div class="row justify-content-end">
            <div class="col-2">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
        </form>
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
         @if(Session::has('fail'))
             <script>
                 Swal.fire({
                     icon: 'error',
                     title: 'Algo salio mal!',
                     text: '{{ Session::get("fail") }}'
                 })
             </script>
         @endif
         <style>
         
             /* .cargar-archivo {
                 position: absolute;
                 top: 0px;
                 max-width: 100%;
                 min-height: 10%;
                 font-size: 50px;
                 text-align: center;
                 filter: alpha(opacity=0);
                 opacity: 0;
                 outline: none;
                 background: rgb(255, 255, 255);
                 cursor: inherit;
                 display: block;
             } */
         </style>
</div>
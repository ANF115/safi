<div>
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
                    <button type="button" class="btn btn-success "  wire:click="save()">Guardar</button>
                </div>
                
            
            </div>
            <br>
        </div>
        <div class="container">
             <div class="row g-3">
                <div class="col-sm">
                        <a href="{{ route('cuentasMay') }}" type="button" class="btn btn-success " >Siguiente</a>
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

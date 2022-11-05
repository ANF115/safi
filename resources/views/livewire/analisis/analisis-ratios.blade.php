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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>
    <body>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-3">
            <!-- Tabla para seleccionar periodos -->
            <table  class="table">
                <thead class="table-primary" >
                    <tr >
                        <td colspan="4">Periodos</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periodos as $periodo)
                        <tr>
                        <th scope="row">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th>
                            <td colspan="2">{{ $periodo->year }}</td>
                            <td>
                            <span class="material-symbols-outlined">more_vert</span>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                </tbody>
            </table>
            <!-- Tabla para seleccionar la gategoria  a analizar -->
            <table  class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <td colspan="2">Categorias de Análisis</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                        <th scope="row">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th>
                            <td>{{ $categoria->nombre_categoria }}</td>
                        </tr>
                        <tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-grid gap-2 col-12 mx-auto">
                <button type="button" class="btn btn-primary">Análizar</button>
            </div>
        </div>
        <div class="col-8">col-8

        </div>
    </div>
    </div>
</div>

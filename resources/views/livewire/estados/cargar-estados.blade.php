<div class="container-md">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />   
    </head><br>
    <h1>Cargar Estados Financieros</h1><br>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="{{url('/downloads/EstadosFinancieros.xlsx')}}" download="EstadosFinancieros.xlsx" style="background-color:#5BA0FF; border:none" class="btn btn-primary"  >
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
        <div class="input-group input-group-sm mb-3">
            <input type="text" placeholder="Año" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></div>
            <div class="card border-primary" style="border-style:dashed;">
                <div class="card-body">
                    <div class="container text-center">
                        <div class="row justify-content-md-center">
                            <div class="col col-lg-2">
                                <span style="font-size:40px; margin-top:8px" class="material-symbols-outlined">
                                    cloud_upload
                                </span>
                            </div>
                            <div class="col-md-auto">
                                <p style="margin-top:20px ;">Seleccione o Arrastre los estados financieros</p>
                            </div>
                        </div>
                    </div>
                    <input class="cargar-archivo" type="file">
                </div>
            </div><br>
            <div class="row justify-content-end">
                <div class="col-2">
                    <button type="button"  class="btn btn-success">Guardar</button>
                </div> 
            </div>
        </div>
    </div>
</div>
<style>
    .cargar-archivo{
        position: absolute;
        top:0px;
        max-width:100%;
        min-height: 10%;
        font-size: 50px;
        text-align: center;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: rgb(255, 255, 255);
        cursor: inherit;
        display: block;
    }
</style>
<div >
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        
    </head>
    <body>
    <br>
    <div class="container">
        <div class="row g-3">
            <h1>Registro de Catálogo</h1>
            <div class="col-sm">
                
                <input type="text" class="form-control" id="nombre" placeholder="Nombre Catálogo">
                <br>
                
            </div>
            <div class="col-sm">
                <button type="button" class="btn btn-success ">Guardar</button>
            </div>
            
        
        </div>
        <br>
    </div>
    <div class="container">
        <div class="row g-3">
            <h2>Cuentas Mayor</h2>
            <div class="col-sm" >
                
                <input type="text" class="form-control" id="nombre_mayor" placeholder="Nombre">
            </div>
            <div class="col-sm">
                
                <input type="text" class="form-control" id="codigo" placeholder="Código">
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-success">Guardar</button>
            </div>
        </div>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    
                    <th scope="col">Nombre</th>
                    <th scope="col">Código</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
           

            <tbody>
                 
                <tr>
                        
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



    <div class="container">
        <div class="row g-3">
            <h2>Cuentas </h2>
            <div class="col-sm" >
               
                <input type="text" class="form-control" id="nombre_mayor" placeholder="Nombre">
            </div>
            <div class="col-sm">
                
                <input type="text" class="form-control" id="codigo" placeholder="Código">
            </div>
            <div class="col-sm">
            <select class="form-select" aria-label="Default select example">
                <option selected>Cuenta Mayor</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
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
                    
                    <th scope="col">Nombre</th>
                    <th scope="col">Código</th>
                    <th scope="col">Cuenta Mayor</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
           

            <tbody>
                 
                <tr>
                        
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

    <div class="container">
        <div class="row g-3">
            <h2>SubCuentas </h2>
            <div class="col-sm" >
               
                <input type="text" class="form-control" id="nombre_mayor" placeholder="Nombre">
            </div>
            <div class="col-sm">
                
                <input type="text" class="form-control" id="codigo" placeholder="Código">
            </div>
            <div class="col-sm">
            <select class="form-select" aria-label="Default select example">
                <option selected>Cuenta</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
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
                    
                    <th scope="col">Nombre</th>
                    <th scope="col">Código</th>
                    <th scope="col">Cuenta</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
           

            <tbody>
                 
                <tr>
                        
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
    
    
    
    
    
</div>



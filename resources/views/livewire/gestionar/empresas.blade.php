<div class="" style="float: center; margin: 1rem; ">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <br>
    <br>
    <div class="row">
        <div class="col">
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-2">
                            <input type="text" class="form-control" placeholder="Search" wire:model="search">
                        </div>
                        
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre Empresa </th>
                                <th scope="col">#Rubro </th>
                                <th scope="col">Nombre Rubro</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $value->nombre_empresa }}</td>
                                    <td>{{ $value->rubro_id }}</td>
                                    <td>{{ $value->rubro->name }}</td>
                                    <td>{{ $value->name }}</td>
                                    
                                    <td>{{ $value->email }}</td>
                                    

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{ $usuarios->links() }}

                </div>
            </div>
        </div>
        <div class="col">
        </div>
    </div>
    <br>
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

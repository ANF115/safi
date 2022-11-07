<div>
<link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="features.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/features/">

    <body>
        <svg svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="excel" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"/>
        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708l3-3z"/>
        </symbol>
        <symbol id="registrar" viewBox="0 0 16 16">
        <path d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081h1.244zm2.7-7.923L6.34 9.314H3.51l1.4-4.156h.034zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525z"/>
        </symbol>
        
        </svg>

    <main>
        <div class="container px-4 py-5 " id="hanging-icons">
            <div>
                
                <h1>SAFI</h1>
                
                <h2>Sistema de Análisis Financiero</h2>
            </div>
                
                <div class="row g-4 py-5">
                    <div class="col d-flex align-items-start">
                    <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="5em" height="5em"><use xlink:href="#excel"/></svg>
                    </div>
                    <div>
                        <h3 class="fs-2">Cargar Estados Financieros</h3>
                        <p>Cargar estados financieros a traves de un archivo de excel.</p>
                        <a href="{{ route('cargarEstados') }}" class="btn btn-primary">
                        Consultar
                        </a>
                    </div>
                    </div>
                    <div class="col align-items-start">
                    <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="5em" height="5em"><use xlink:href="#registrar"/></svg>
                    </div>
                    <div>
                        <h3 class="fs-2">Registrar Estados Financieros </h3>
                        <p>Seleccionar las cuentas manualmente del catálogo y crear los estados financieros.</p>
                        <a href="{{ route('registrarPeriodo') }}" class="btn btn-primary">
                        Consultar
                        </a>
                    </div>
                    </div>
                    
                    
                    
                </div>
                

            
                
        </div>
        
    </main>  
        <script src="js/bootstrap.bundle.min.js"></script>
  
    </body>
</div>
<style>
    .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }

          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }

          .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
          }

          .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
          }

          .bi {
            vertical-align: -.125em;
            fill: currentColor;
          }

          .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
          }

          .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
          }

          h1{
            text-align:center;
            font-weight: normal;
            font-size: 80px;
            font-family: Hero headline;
            text-transform: uppercase;
            color: #7B61FF;
        }
        h2{
            text-align:center;
            font-weight: bold;
            font-size: 24px;
            font-family: Headline;
            text-transform: uppercase;
            color: #666666;

        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));

        }
</style>

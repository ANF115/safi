<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAFI</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/slick.css" type="text/css" /> 
    <link rel="stylesheet" href="css/templatemo-style.css">
<!--
    
TemplateMo 560 Astro Motion

https://templatemo.com/tm-560-astro-motion

-->
</head>
<body>
    <video autoplay muted loop id="bg-video">
        <source src="video/Analisis-1.mp4" type="video/mp4">
    </video>
    <div class="page-container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
       
            <div class="cd-slider-nav">
              <nav class="navbar navbar-expand-lg" id="tm-nav">
              
                <div class="logo-menu">
                  
                    <h1>SAFI</h1>
                    <h2>Sistema de Análisis Financiero</h2>
                    
                    
                    
                  
                </div>
                
                
                
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-supported-content" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbar-supported-content">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                      
      
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" >Iniciar Sesión</a>
                        <div class="circle"></div>
                      </li>
                      <li class="nav-item">
                         
                        <a class="nav-link" href="{{ route('register') }}" >Registrarse</a>
                       
              
        
                        <div class="circle"></div>
                      </li>
                    </ul>
                  </div>
              </nav>
            </div>
          </div>          
        </div>        
      </div>      
      <div class="container-fluid tm-content-container">
        <ul class="cd-hero-slider mb-0 py-5">
          <li class="px-3" data-page-no="1">
            <div class="page-width-1 page-left">
              <div class="d-flex position-relative tm-border-top tm-border-bottom intro-container">
                <div class="intro-left tm-bg-dark">
                  <h3 class="mb-4">Bienvenido a SAFI </h2>
                  <p class="mb-4">
                    This HTML template has a motion video background loop which is provided by <a rel="sponsored" href="https://getfreepictures.com" target="_blank">Get Free Pictures</a>. This is
                    one-page responsive layout for your websites. Feel
                  free to use this for a commercial purpose. </p>
                  <p class="mb-0">
                  You are not permitted to redistribute this template on your Free CSS collection websites. Please <a rel="nofollow" href="https://templatemo.com/contact" target="_blank">contact us</a> for more information. </p>
                </div>
                
                <div class="circle intro-circle-1"></div>
                <div class="circle intro-circle-2"></div>
                <div class="circle intro-circle-3"></div>
                <div class="circle intro-circle-4"></div>
                
              </div>
                         
            </div>            
          </li>
        </ul>
      </div>
    </div>
          
  <!-- Preloader, https://ihatetomatoes.net/create-custom-preloading-screen/ -->
  <div id="loader-wrapper">            
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>  
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/slick.js"></script>
  <script src="js/templatemo-script.js"></script>
</body>
</html>

<style>

    h1{

        text-align: center;        
        font-weight: normal;
        font-size: 80px;
        font-family: Hero headline;
        text-transform: uppercase;
        color: white;
      }
    h2{
        
        font-weight: bold;
        font-size: 24px;
        font-family: Headline;
        text-transform: uppercase;
        color: white;

     filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));

    }

    .logo-menu{
      position: absolute;
        top:-20%;
        right: 60%;
        margin-right: -100px;
    }
    

    
</style>

<?php include('session.php'); ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Pelis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <style>
        .carousel-inner img {
            width: 100%;
            height: 499px;
        }

        @media (max-width: 575px) {
            .carousel-inner img {
                width: 100%;
                height: 220px;
            }
        }

        #icono {
            width: 40px;
            height: 40px;
        }


        h1 {
            text-align: center;
        }

        footer {

            text-align: center;
            font-style: italic;
            box-shadow: 5px -5px 10px #E6D5B8;
        }

        .card-img-top{
            max-height: 28rem;
            max-width: 18rem; 
            margin: 0 auto; 
        }
        
        
    </style>





</head>

<body style="background-color: #E45826">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- icono o nombre -->

            <a class="navbar-brand" href="home.php">
                <i class="bi bi-film"></i>
                <span class="text-warning">Top Pelis</span>
            </a>

            <!-- boton del menu -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- elementos del menu colapsable -->

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="menu-image.php">Películas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Mis favoritas</a>
                    </li>
                </ul>

                <hr class="d-md-none text-white-50">

                <!-- enlaces redes sociales -->

                <ul class="navbar-nav  flex-row flex-wrap text-light">

                    <li class="nav-item col-6 col-md-auto p-3">
                        <i class="bi bi-twitter"></i>
                        <small class="d-md-none ms-2">Twitter</small>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <i class="bi bi-github"></i>
                        <small class="d-md-none ms-2">GitHub</small>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <i class="bi bi-whatsapp"></i>
                        <small class="d-md-none ms-2">WhatsApp</small>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <i class="bi bi-facebook"></i>
                        <small class="d-md-none ms-2">Facebook</small>
                    </li>

                </ul>

                <!--boton Informacion -->

                <form class="d-flex">
                    <a href="logout.php" class="btn btn-outline-warning d-none d-md-inline-block " type=button>LOG OUT</a>
    
                </form>


            </div>

        </div>
    </nav>





    <div class="row" style="background-color: #E45826;">
        <div class="col">
            <div class="jumbotron text-center">
                <h1 class="display-2">Bienvenid@ <span class="text-muted"><?php echo $user; ?>!</span></h1>

                <h3 class="mt-4 display-8">En este sitio web podrás ver algunas pelis, donde tendrás la posibilidad de darles un LIKE y marcarlas como favoritas, como así tambien, dejar algun comentario de tu preferencia ;)</h3>
            </div>
        </div>
    </div>





    <div id="carouselExampleIndicators" class="carousel slide mt-3" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="6000">
                <img src="./img/aventuras.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="./img/accion2.jpg" class="d-block w-100" alt="...">
            </div>
            
            <div class="carousel-item" data-bs-interval="6000">
                <img src="./img/ficcion.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="./img/accion.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="6000">
                <img src="./img/terror.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class="container mt-4" style="background-color: #E45826">
        <div class="row m-0 justify-content-center">

            <div class="col-auto text-center col-12 col-md-6 mt-4">

                <div class="card" style="background-color: #E6D5B8; height: 25rem;">
                    <img src="./img/peliculas.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">PELICULAS</h5>
                        <a href="menu-image.php" class="btn btn-dark"><i class="bi bi-eye"></i> Ver más</a>
                    </div>
                </div>
            </div>
            <div class="text-center col-12 col-md-6 mt-4">
                <div class="card" style="background-color: #E6D5B8; height: 25rem;">
                    <img src="./img/like.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">MIS FAVORITAS</h5>
                        <a href="#" class="btn btn-dark"><i class="bi bi-emoji-heart-eyes-fill"></i> Ver más</a> 
                        
                    </div>
                </div>

            </div>

        </div>
    </div>



    <div class="container-fluid bg-primary">
        <div class="row mt-5" style="background-color: #F0A500">
            <footer>
                <p class="mt-3" style="color: black">Todos los derechos reservados | © Ana Lucia Juarez 2022</p>
                <p style="color: black">Miramar, Buenos Aires, Argentina</p>
            </footer>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>

</html>
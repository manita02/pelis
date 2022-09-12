<?php

require_once 'conn.php';
require_once 'login.php';

if (isset($_GET['type'], $_GET['idpelicula'])) {
    $type = $_GET['type'];
    $idpelicula  = (int)$_GET['idpelicula'];


    switch ($type) {
        case 'pelicula':
            #echo $type; 
            #echo $idpelicula;


            $peliculasQuery = $conn->query("

        SELECT pelicula.idpelicula, 
        pelicula.titulo, pelicula.descripcion, pelicula.url_imagen,
        pelicula.anio_estreno,pelicula.pais, pelicula.director, 
        pelicula.url_trailer,genero.nombre_genero,
        
        COUNT(likes.id) AS likes,
        GROUP_CONCAT(user.username SEPARATOR '|') AS liked_by 
        
    
        FROM pelicula 
        
        LEFT JOIN genero
        ON pelicula.genero_idgenero = genero.idgenero    
        
        LEFT JOIN likes
        ON pelicula.idpelicula = likes.idpelicula

        LEFT JOIN user
        ON likes.iduser = user.userid

        WHERE pelicula.idpelicula = {$idpelicula}

        GROUP BY pelicula.idpelicula

        

        ");

            while ($row = $peliculasQuery->fetch_object()) {
                $row->liked_by = $row->liked_by ? explode('|', $row->liked_by) : [];
                $peliculas[] = $row;
            }

            //echo '<pre>', print_r($peliculas, true), '</pre>'; 


            break;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagen seleccionada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <style>
        h1 {
            text-align: center;
        }

        footer {
            
            text-align: center;
            
            color: white;
            font-style: italic;
            box-shadow: 5px -5px 10px #9D003E;
        }

        @media (max-width: 575px) {
            div {
                margin: 0 auto;
            }

            p,
            h3 {
                text-align: center;
            }

            .btn {
                margin-left: 40%;
            }
        }


        @media (max-width: 454px) {
            img {
                height: 400px;
            }


        }

        @media (max-width: 386px) {
            img {
                height: 350px;
            }


        }

        @media (max-width: 324px) {
            img {
                height: 300px;
            }


        }

        @media (max-width: 288px) {
            img {
                height: 250px;
            }


        }

        @media (max-width: 413px) {
            div {
                margin: 0 auto;
            }

            p,
            h3 {
                text-align: center;
            }

            .btn {
                margin-left: 35%;
            }
        }





        @media (max-width: 323px) {
            div {
                margin: 0 auto;
            }

            p,
            h3 {
                text-align: center;
            }

            .btn {
                margin-left: 30%;
            }
        }
    </style>


</head>

<body>

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
            <li class="nav-item">
              <a class="nav-link active" href="#">Recomendar</a>
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
            <button class="btn btn-outline-warning d-none d-md-inline-block " type="submit">Informacion</button>
          </form>
          
          
        </div>
     
        </div>  
      </nav>

    <?php foreach ($peliculas as $pelicula) : ?>
        <div class="pelicula">
            <div class="container-fluid">
                <div class="row mt-4">
                    <h1 class="mt-3"><?php echo $pelicula->titulo ?></h1>

                    <div class="col-8 col-sm-7 col-md-5 col-lg-3 mt-4">
                        <img class="rounded" src="<?php echo $pelicula->url_imagen ?>" alt="" width="100%" height="500">
                    </div>



                    <div class="col-12 col-sm-5 col-md-7 col-lg-2 mt-5">
                        <p>Género: <?php echo $pelicula->nombre_genero ?></p>
                        <p>Pais: <?php echo $pelicula->pais ?></p>
                        <p>Año de estreno: <?php echo $pelicula->anio_estreno ?></p>
                        <p>Dirigida por: <?php echo $pelicula->director ?></p>
                        <a class="btn btn-primary mt-3" href=<?php echo $pelicula->url_trailer ?> target="blank" role="button">Ver Trailer</a>




                    </div>


                    <div class="col-12 col-sm-8 col-md-8 col-lg-5 mt-5">
                        <h3 class="mt-3">SINOPSIS</h3>
                        <p><?php echo $pelicula->descripcion ?></p>

                    </div>

                    <div class="col-12 col-sm-3 col-md-3 col-lg-2 mt-5">

                        <a role="button" class="btn btn-primary mt-3" href="like.php?type=pelicula&idpelicula=<?php echo $pelicula->idpelicula; ?>">Me gusta <i class="bi bi-hand-thumbs-up-fill"></i> </a>
                        <!--aca estaba el peliculas que enlaza al like.php-->
                        <p class="mt-2"><?php echo $pelicula->likes; ?> personas les gustó</p>
                        <?php if (!empty($pelicula->liked_by)) : ?>
                            <ul style="list-style: none;">
                                <?php foreach ($pelicula->liked_by as $user) : ?>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                                        </svg> <?php echo $user; ?>
                                    </li>



                                <?php endforeach; ?>
                            </ul>
                            <!--ese if verifica si el grupo de liked by NO esta vacio.. osea quiere decir que una persona clikeo por tanto le gusto la pelicula y quedara registrado-->

                        <?php endif; ?>

                    </div>



                </div>



                <form method="POST" action="enviarcomentario.php?type=pelicula&idpelicula=<?php echo $pelicula->idpelicula; ?>">
                    <section id="contact">
                        <div class="container px-4">
                            <div class="row gx-4 justify-content-center">
                                <div class="col-lg-8">
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="comentario" class="form-label">Comentario:</label>
                                            <textarea class="form-control" name="comentario" cols="30" rows="5" type="text" id="comentario" placeholder="Escribe tu comentario......" required></textarea>
                                            
                                        </div>
                                        <br>
                                        <input class="btn btn-primary" type="submit" value="Enviar Comentario">
                                       
                                        <br>
                                        <br>
                                        <br>

                                        <?php

                                            
                                            #echo $idpelicula;
                                            $conexion = mysqli_connect("localhost", "root", "43906838", "sesionprueba");
                                            $resultado = $conexion->query("SELECT * FROM comentarios 
                                            LEFT JOIN user
                                            ON comentarios.idusuario = user.userid  
                                            WHERE idpelicula = {$idpelicula}");



                                            while ($comentario = mysqli_fetch_object($resultado)) {

                                            ?>

                                            <b><?php echo ($comentario->username);  ?></b>(<?php echo ($comentario->fecha); ?>) dijo:
                                            <br />
                                            <?php echo ($comentario->comentario); ?>
                                            <br />
                                            <hr />




                                            <?php
                                            }
                                            
                                            ?>

                                    
                                </div>
                

                            </div>
                        </div>

                    </section>

                </form>


            </div>
        </div>


        <?php endforeach; ?>
</body>

<div class="container-fluid bg-primary">
        <div class="row mt-5">
            <footer>
                <p class="mt-3">Todos los derechos reservados | © Ana Lucia Juarez 2022</p>
                <p>Miramar, Buenos Aires, Argentina</p>
            </footer>

        </div>
    </div>

</html>



<?php
/*

    function cargar(){
        $conn->query("
                    INSERT INTO likes (iduser, idpelicula)
                        SELECT {$_SESSION['user']}, {$idpelicula}
                        FROM pelicula
                        WHERE EXISTS (
                            SELECT idpelicula
                            FROM pelicula
                            WHERE idpelicula = {$idpelicula})

                        AND NOT EXISTS (
                            SELECT id
                            FROM likes
                            WHERE iduser = {$_SESSION['user']} 
                            AND idpelicula = {$idpelicula})
                        LIMIT 1
                        
                
                ");
    }

*/

?>
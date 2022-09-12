<?php 
        require_once 'conn.php'; 
        require_once 'login.php'; 

    
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

        GROUP BY pelicula.idpelicula

        "); 

while($row = $peliculasQuery->fetch_object()){
    $row->liked_by = $row->liked_by ? explode('|', $row->liked_by ) : []; 
    $peliculas[] = $row; 
}



//echo '<pre>', print_r($peliculas, true), '</pre>'; 

//die(); 
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>
<body>
    

<?php foreach($peliculas as $pelicula):?>
        <div class="pelicula">
            <div class="container-fluid">
                    <div class="row mt-4">
                            <h1><?php echo $pelicula->titulo ?></h1> 

                            <div class="col-8 col-sm-7 col-md-3">
                                    <img src="<?php echo $pelicula->url_imagen ?>" alt="" width="100%" height="500">
                                </div>

                                

                                <div class="col-12 col-sm-5 col-md-2">
                                    <p>Género: <?php echo $pelicula->nombre_genero ?></p>
                                    <p>Pais: <?php echo $pelicula->pais ?></p>
                                    <p>Año de estreno: <?php echo $pelicula->anio_estreno ?></p>
                                    <p>Dirigida por: <?php echo $pelicula->director ?></p>
                                    <a class="btn btn-primary mt-3" href=<?php echo $pelicula->url_trailer ?> target="blank" role="button">Ver Trailer</a>
                                    

                                    
                                        
                                </div>

                            
                                <div class="col-12 col-sm-8 col-md-5">
                                        <h3 class="mt-3">SINOPSIS</h3>
                                        <p><?php echo $pelicula->descripcion ?></p>
                                               
                                </div>

                                <div class="col-12 col-sm-3 col-md-2">
                                         <a role="button" class="btn btn-primary mt-3" href="like.php?type=pelicula&idpelicula=<?php echo $pelicula->idpelicula; ?>">Me gusta <i class="bi bi-hand-thumbs-up-fill"></i> </a> <!--aca estaba el peliculas que enlaza al like.php-->
                                        <p class="mt-2"><?php echo $pelicula->likes; ?> personas les gustó</p>
                                        <?php if(!empty($pelicula->liked_by)): ?> 
                                            <ul style="list-style: none;">
                                                <?php foreach($pelicula->liked_by as $user): ?>
                                                    <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                                    </svg> <?php echo $user; ?>
                                                    </li>

                                                    

                                                <?php endforeach; ?>
                                            </ul>             <!--ese if verifica si el grupo de liked by NO esta vacio.. osea quiere decir que una persona clikeo por tanto le gusto la pelicula y quedara registrado-->
                                            
                                        <?php endif; ?>

                                </div>


        
                    </div>
            </div>



            
        </div>

    <?php endforeach; ?>

    
    
              
</body>
</html>


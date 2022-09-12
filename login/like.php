<?php
    require_once 'conn.php'; 
    require_once 'login.php'; 
   

    if(isset($_GET['type'], $_GET['idpelicula'])){

        $type = $_GET['type'];
        $idpelicula = (int)$_GET['idpelicula']; 

        switch($type){
            case 'pelicula':  #este peliculas q no sabia de donde p**** venia.. viene del peliculas.php del link que enlaza al boton de me gusta (<a href="like.php?type=peliculas&id=<?php echo $row["idpelicula"];
                #echo 'OK!';
                //echo $type; 
                //echo $idpelicula; 

                
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>
<body>
    <div class="text-center mt-5">
    <h1>Gracias por tu LIKE</h1>
    <a role="button" class="btn btn-primary mt-3" href="home.php"><i class="bi bi-chevron-double-left"></i> Volver al Inicio</a>
    </div>
</body>
</html>

    
    
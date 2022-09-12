<?php  
require_once 'login.php'; 

// Llamando a los campos
#$nombre = $_POST['nombre'];

$idusuario = $_SESSION['user']; 

#echo $idusuario; 

$comentario= $_POST['comentario'];

$type = $_GET['type']; 
$idpelicula   = (int)$_GET['idpelicula']; 



$conexion=mysqli_connect("localhost","root","43906838","sesionprueba");  
$comentario= mysqli_real_escape_string($conexion,$comentario);
$resultado=mysqli_query($conexion,
'INSERT INTO comentarios (comentario, idpelicula, idusuario) 
VALUES ("'.$comentario.'", "'.$idpelicula.'", "'.$idusuario.'")');



#header('Location: ../pelicula.php');



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
    <h1>Se ha registrado su comentario...</h1>
    <a role="button" class="btn btn-primary mt-3" href="home.php"><i class="bi bi-chevron-double-left"></i> Volver al Inicio</a>
    </div>
</body>
</html>




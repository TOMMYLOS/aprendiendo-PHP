<?php

include_once 'conexion.php';
//LEER BASE DE DATOS
$sql_leer = 'SELECT * FROM colores';

$gsent = $pdo->prepare($sql_leer);
$gsent->execute();

$resultado = $gsent->fetchAll();

//var_dump($resultado);

//AGREGAR
if($_POST){
    $color = $_POST['color'];
    $descripcion = $_POST['descripcion'];

    $sql_agregar = 'INSERT INTO colores(color,descripcion) VALUES (?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($color,$descripcion));

      header('location:index.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0c586bdc52.js" crossorigin="anonymous"></script>
    <title>Hola Mundo</title>
  </head>
  <body>
    <h1>Hola Mundo</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="cold-md-6">

                <?php foreach($resultado as $dato): ?>

                <div 
                class="alert alert-<?php echo $dato ['color'] ?> text-uppercase" 
                role="alert">
                     <?php echo $dato ['color'] ?>
                     -
                     <?php echo $dato ['descripcion'] ?>

                     <a href="index.php?id=<?php echo $dato ['id'] ?>" 
                     class="float-right">
                     <i class="fas fa-pencil-alt"></i></a>
                </div>

                <?php endforeach ?>
            </div>

            <div class="cold-md-6">
                  <?php if($_GET):?>
                  <h2>AGREGAR ELEMENTOS</h2>
                  <form method="POST">
                        <input type="text" class="form-control" name="color">
                        <input type="text" class="form-control mt-4" name="descripcion">
                        <button class="btn btn-primary mt-5">Agregar</button>

                  </form>
                  <?php endif ?>
            </div>


        </div> 
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
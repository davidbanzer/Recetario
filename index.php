<?php
include_once "vendor/autoload.php";

use App\bll\RecetaBLL;

$RecetaBLL = new RecetaBLL();
$task = "list";
if (isset($_REQUEST['task'])) {
    $task = $_REQUEST['task'];
}
switch ($task) {
    case "insert":
        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["descripcion"])
            && isset($_REQUEST["tiempo_preparacion"]) && isset($_REQUEST["foto"])) {
            $nombre = $_REQUEST["nombre"];
            $descripcion = $_REQUEST["descripcion"];
            $tiempo_preparacion = $_REQUEST["tiempo_preparacion"];
            $foto = $_REQUEST["foto"];
            $RecetaBLL->insert($nombre, $descripcion, $tiempo_preparacion, $foto);
        }
        break;
    case "update":
        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["descripcion"])
            && isset($_REQUEST["tiempo_preparacion"]) && isset($_REQUEST["foto"]) && isset($_REQUEST["id"])) {
            $nombre = $_REQUEST["nombre"];
            $descripcion = $_REQUEST["descripcion"];
            $tiempo_preparacion = $_REQUEST["tiempo_preparacion"];
            $foto = $_REQUEST["foto"];
            $id = $_REQUEST["id"];
            $RecetaBLL->update($nombre, $descripcion, $tiempo_preparacion,$foto, $id);
        }
        break;
    case "delete":
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $RecetaBLL->delete($id);
        }
        break;
}
$listaRecetas = $RecetaBLL->selectAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>
    <script src="vendor/components/jquery/jquery.js" type="text/javascript"></script>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>
<div class="main-header">
    <div class="container py-5">
        <div class="card-columns">
            <?php
            foreach ($listaRecetas as $item): ?>
                <div class="card">
                    <a href="ver-receta.php?id=<?php echo $item->getId(); ?>">
                        <img class="card-img-top" height="250" width="250"
                             src="<?php echo $item->getFoto() ?>">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $item->getNombre() ?></h4>
                        <p class="card-text"><?php echo $item->getDescripcion() ?></p>
                        <small>Tiempo de preparación: <?php echo $item->getTiempoPreparacion() ?></small> <br>
                        <a class="float-right p-2 text-danger" href="index.php?task=delete&id=<?php echo $item->getId(); ?>">eliminar</a>
                        <a class="float-right p-2" href="formReceta.php?id=<?php echo $item->getId();?>">editar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>

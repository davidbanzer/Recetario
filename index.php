<?php
include_once "vendor/autoload.php";

use App\bll\IngredienteBLL;
use App\bll\PreparacionBLL;
use App\bll\RecetaBLL;

$RecetaBLL = new RecetaBLL();
$IngredienteBLL = new IngredienteBLL();
$PreparacionBLL = new PreparacionBLL();
$task = "list";
$form = "form";
if (isset($_REQUEST['task']) && isset($_REQUEST['form'])) {
    $task = $_REQUEST['task'];
    $form = $_REQUEST['form'];
}
switch ($form) {
    case "receta" :
    {
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
                    $RecetaBLL->update($nombre, $descripcion, $tiempo_preparacion, $foto, $id);
                }
                break;
            case "delete":
                if (isset($_REQUEST["id"])) {
                    $id = $_REQUEST["id"];
                    $RecetaBLL->delete($id);
                }
                break;
        }
    }
    case "ingrediente":
    {
        switch ($task) {
            case "insert":
                if (isset($_REQUEST["descripcion"]) && isset($_REQUEST["recetaId"])) {
                    $descripcion = $_REQUEST["descripcion"];
                    $recetaId = $_REQUEST["recetaId"];
                    $IngredienteBLL->insert($descripcion, $recetaId);
                }
                break;
            case "update":
                if (isset($_REQUEST["descripcion"]) && isset($_REQUEST["recetaId"]) && isset($_REQUEST["id"])) {
                    $descripcion = $_REQUEST["descripcion"];
                    $recetaId = $_REQUEST["recetaId"];
                    $id = $_REQUEST["id"];
                    $IngredienteBLL->update($descripcion, $recetaId, $id);
                }
                break;
            case "delete":
                if (isset($_REQUEST["id"])) {
                    $id = $_REQUEST["id"];
                    $IngredienteBLL->delete($id);
                }
                break;
        }
    }
    case "preparacion":
    {
        switch ($task) {
            case "insert":
                if (isset($_REQUEST["descripcion"]) && isset($_REQUEST["orden"]) &&isset($_REQUEST["recetaId"])) {
                    $descripcion = $_REQUEST["descripcion"];
                    $recetaId = $_REQUEST["recetaId"];
                    $orden = $_REQUEST["orden"];
                    $PreparacionBLL->insert($descripcion,$orden,$recetaId);
                }
                break;
            case "update":
                if (isset($_REQUEST["descripcion"]) && isset($_REQUEST["orden"]) && isset($_REQUEST["recetaId"]) && isset($_REQUEST["id"])) {
                    $descripcion = $_REQUEST["descripcion"];
                    $recetaId = $_REQUEST["recetaId"];
                    $orden = $_REQUEST["orden"];
                    $id = $_REQUEST["id"];
                    $PreparacionBLL->update($descripcion,$orden,$recetaId, $id);
                }
                break;
            case "delete":
                if (isset($_REQUEST["id"])) {
                    $id = $_REQUEST["id"];
                    $PreparacionBLL->delete($id);
                }
                break;
        }
    }
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
                        <a class="float-right p-2 text-danger"
                           onclick="return confirm('¿Está seguro que desea eliminar la receta?')"
                           href="index.php?task=delete&form=receta&id=<?php echo $item->getId(); ?>">eliminar</a>
                        <a class="float-right p-2" href="formReceta.php?id=<?php echo $item->getId(); ?>">editar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>

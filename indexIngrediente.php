<?php
include_once "vendor/autoload.php";

use App\bll\IngredienteBLL;

$IngredienteBLL = new IngredienteBLL();
$task = "list";
if (isset($_REQUEST['task'])) {
    $task = $_REQUEST['task'];
}
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
        <h3 class="text-white text-center">Ingrediente ingresado correctamente</h3>
    </div>
</div>
</body>
</html>

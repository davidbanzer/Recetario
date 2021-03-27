<?php
include_once "vendor/autoload.php";

use App\bll\RecetaBLL;


$RecetaBLL = new RecetaBLL();

$id = 0;
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $objReceta = $RecetaBLL->selectById($id);

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-white">
                <form action="index.php" method="post">
                    <h1 class="mt-3">Receta</h1>
                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <input type="hidden" name="task" value="<?php echo ($id == 0) ? "insert" : "update" ?>" />
                    <label class="form-label"><h3>Nombre</h3></label>
                    <input type="text" name="nombre" class="form-control mb-3" value="<?php echo ($objReceta == null) ? '' : $objReceta->getNombre(); ?>"/>
                    <label class="form-label"><h3>Descripcion</h3></label>
                    <input type="text" name="descripcion" class="form-control mb-3" value="<?php echo ($objReceta == null) ? '' : $objReceta->getDescripcion(); ?>"/>
                    <label class="form-label"><h3>Tiempo de preparación</h3></label>
                    <input type="text" name="tiempo_preparacion" class="form-control mb-3" value="<?php echo ($objReceta == null) ? '' : $objReceta->getTiempoPreparacion(); ?>"/>
                    <label class="form-label"><h3>Foto (url)</h3></label>
                    <input type="text" name="foto" class="form-control mb-3" value="<?php echo ($objReceta == null) ? '' : $objReceta->getFoto(); ?>"/>
                    <input type="submit" value="Enviar" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
include_once "vendor/autoload.php";

use App\bll\PreparacionBLL;
use App\bll\RecetaBLL;



$RecetaBLL = new RecetaBLL();
$PreparacionBLL = new PreparacionBLL();
$id = 0;
$objReceta = null;
$objPreparacion = null;
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $objPreparacion = $PreparacionBLL->selectById($id);
}
$objReceta = $RecetaBLL->selectAll();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Preparación</title>
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
                    <h1 class="my-3">Preparación</h1>
                    <input type="hidden" name="form" value="preparacion"/>
                    <input type="hidden" name="id" value="<?php echo $id ?>"/>
                    <input type="hidden" name="task" value="<?php echo ($id == 0) ? "insert" : "update" ?>"/>
                    <label class="form-label"><h3>Descripción</h3></label>
                    <input type="text" class="form-control" name="descripcion" value="<?php echo ($objPreparacion == null) ? '' : $objPreparacion->getDescripcion(); ?>">
                    <label class="form-label mt-3"><h3>Orden</h3></label>
                    <input type="number" name="orden" class="form-control" value="<?php echo ($objPreparacion == null) ? '' : $objPreparacion->getOrden(); ?>">
                    <label class="form-label mt-3"><h3>Receta</h3></label>
                    <select name="recetaId" class="form-control">
                        <?php foreach ($objReceta as $item): ?>
                            <option <?php if ($objPreparacion != null && $item->getId() == $objPreparacion->getRecetaId()){
                                echo "selected";
                            }?> value="<?php echo $item->getId()?>">
                                <?php echo $item->getNombre()?>
                            </option>
                        <?php endforeach;?>
                    </select>
                    <input type="submit" value="enviar" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
include_once "vendor/autoload.php";

use App\bll\IngredienteBLL;

$IngredienteBLL = new IngredienteBLL();
$RecetaBLL = new \App\bll\RecetaBLL();
$PreparacionBLL = new \App\bll\PreparacionBLL();
$id = 0;
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $objReceta = $RecetaBLL->selectById($id);
    $objIngrediente = $IngredienteBLL->selectAllById($id);
    $objPreparacion = $PreparacionBLL->selectAllById($id);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receta</title>
    <script src="vendor/components/jquery/jquery.js" type="text/javascript"></script>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">
</head>
<body>
<?php
include 'header.php';
?>
<div class="main-header">
    <div class="background-overlay">
        <div class="container py-5 text-white">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <h2>Ingredientes:</h2>
                    <?php
                    foreach ($objIngrediente as $item): ?>
                        <p><?php echo $item->getNombre(); ?></p>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-6 align-self-center">
                    <img src="<?php echo $objReceta->getFoto(); ?>" class="img-fluid" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center mt-5">
                    <h2>Cómo hacer <?php echo $objReceta->getNombre(); ?>
                    </h2>
                    <?php foreach ($objPreparacion as $item):?>
                    <p><?php echo $item->getDescripcion();?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

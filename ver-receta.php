<?php
include_once "vendor/autoload.php";

use App\bll\IngredienteBLL;

$IngredienteBLL = new IngredienteBLL();
$RecetaBLL = new \App\bll\RecetaBLL();
$listaIngrediente = $IngredienteBLL->selectAllById(1);
$foto = $RecetaBLL->selectById(1)
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
                    <div class="col-md-6">
                        <h2>Ingredientes:</h2>
                        <?php
                        foreach ($listaIngrediente as $item): ?>
                            <p ><?php echo $item->getNombre();?></p>
                        <?php endforeach;?>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <img class="img-fluid" src="<?php echo $foto->getFoto();?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include_once "vendor/autoload.php";

use App\bll\RecetaBLL;

$RecetaBLL = new RecetaBLL();
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
</head>
<body>
<?php include 'header.php'; ?>
<div class="container mt-3">
    <div class="card-columns">
        <div class="card">
            <img class="card-img-top img-fluid" src="https://t2.rg.ltmcdn.com/es/images/6/5/0/habas_a_la_catalana_75056_600.jpg" >
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top img-fluid" src="https://t2.rg.ltmcdn.com/es/images/6/5/0/habas_a_la_catalana_75056_600.jpg" >
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top img-fluid" src="https://t2.rg.ltmcdn.com/es/images/6/5/0/habas_a_la_catalana_75056_600.jpg" >
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top img-fluid" src="https://t2.rg.ltmcdn.com/es/images/6/5/0/habas_a_la_catalana_75056_600.jpg" >
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top img-fluid" src="https://t2.rg.ltmcdn.com/es/images/6/5/0/habas_a_la_catalana_75056_600.jpg" >
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top img-fluid" src="https://t2.rg.ltmcdn.com/es/images/6/5/0/habas_a_la_catalana_75056_600.jpg" >
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

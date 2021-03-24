<?php
include_once "vendor/autoload.php";
include 'header.php';

use App\bll\RecetaBLL;

$RecetaBLL = new RecetaBLL();
$listaRecetas = $RecetaBLL->selectAll();
foreach ($listaRecetas as $objReceta):
    echo $objReceta->getNombre();
endforeach;
?>
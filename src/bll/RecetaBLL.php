<?php


namespace App\bll;


use App\dal\Connection;
use App\dto\Receta;
use PDO;

class RecetaBLL
{
    function insert($nombre, $descripcion, $tiempo_preparacion, $foto)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams(
            "INSERT INTO receta (nombre, descripcion, tiempo_preparacion, foto)
                VALUES (:varNombre, :varDescripcion, :varTiempoPreparacion, :varFoto)",
            array(
                ":varNombre" => $nombre,
                ":varDescripcion" => $descripcion,
                ":varTiempoPreparacion" => $tiempo_preparacion,
                ":varFoto" => $foto
            )
        );
        return $objConecction->getLastInsertedId();
    }

    function update($nombre, $descripcion, $tiempo_preparacion, $foto, $receta_id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams("
        UPDATE receta
        SET nombre = :varNombre,
            descripcion = :varDescripcion,
            tiempo_preparacion = :varTiempoPreparacion,
            foto = :varFoto
        WHERE receta_id = :varId
        ", array(
            ":varNombre" => $nombre,
            ":varDescripcion" => $descripcion,
            ":varTiempoPreparacion" => $tiempo_preparacion,
            ":varFoto" => $foto,
            ":varId" => $receta_id
        ));
    }

    function delete($receta_id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams("
        DELETE FROM receta WHERE receta_id = :varId
        ", array(
            ":varId" => $receta_id
        ));
    }

    function selectAll()
    {
        $listaRecetas = array();
        $objConnection = new Connection();
        $res = $objConnection->query("
            SELECT *
            FROM receta
        ");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $receta = $this->rowToDto($row);
            $listaRecetas[] = $receta;
        }
        return $listaRecetas;
    }

    function selectById($receta_id)
    {
        $objConnection = new Connection();
        $res = $objConnection->queryWithParams("
            SELECT *
            FROM receta
            WHERE receta_id = :varId
        ", array(
            ":varId" => $receta_id
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $objPersona = $this->rowToDto($row);
        return $objPersona;
    }

    private function rowToDto($row)
    {
        $objReceta = new Receta();

        $objReceta->setId($row["receta_id"]);
        $objReceta->setNombre($row["nombre"]);
        $objReceta->setDescripcion($row["descripcion"]);
        $objReceta->setTiempoPreparacion($row["tiempo_preparacion"]);
        $objReceta->setFoto($row["foto"]);
        return $objReceta;
    }
}
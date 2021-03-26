<?php


namespace App\bll;


use App\dal\Connection;
use App\dto\Preparacion;
use PDO;
class PreparacionBLL
{
    function insert($descripcion,$orden, $receta_id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams(
            "INSERT INTO preparacion (descripcion,orden, receta_id)
                VALUES (:varDescripcion, :varOrden ,:varRecetaId)",
            array(
                ":varDescripcion" => $descripcion,
                ":varOrden" => $orden,
                ":varRecetaId" => $receta_id
            )
        );
        return $objConecction->getLastInsertedId();
    }

    function update($descripcion,$orden, $receta_id, $preparacion_id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams("
        UPDATE preparacion
        SET descripcion = :varDescripcion,
            orden = : varOrden,
            receta_id : varRecetaId
        WHERE preparacion_id = :varPreparacionId
        ", array(
            ":varDescripcion" => $descripcion,
            ":varOrden" => $orden,
            ":varRecetaId"=>$receta_id,
            ":varPreparacionId" => $preparacion_id
        ));
    }

    function delete($preparacion_id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams("
        DELETE FROM preparacion WHERE preparacion_id = :varPreparacionId
        ", array(
            ":varPreparacionId" => $preparacion_id
        ));
    }

    function selectAll()
    {
        $listaPreparacion = array();
        $objConnection = new Connection();
        $res = $objConnection->query("
            SELECT *
            FROM preparacion
        ");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $preparacion = $this->rowToDto($row);
            $listaPreparacion[] = $preparacion;
        }
        return $listaPreparacion;
    }
    function selectAllById($id)
    {
        $listaPreparacion = array();
        $objConnection = new Connection();
        $res = $objConnection->query("
            SELECT *
            FROM preparacion where receta_id = $id
        ");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $preparacion = $this->rowToDto($row);
            $listaPreparacion[] = $preparacion;
        }
        return $listaPreparacion;
    }

    function selectById($preparacion_id)
    {
        $objConnection = new Connection();
        $res = $objConnection->queryWithParams("
            SELECT *
            FROM preparacion
            WHERE preparacion_id = :varPreparacionId
        ", array(
            ":varPreparacionId" => $preparacion_id
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $objPreparacion = $this->rowToDto($row);
        return $objPreparacion;
    }

    private function rowToDto($row)
    {
        $objPreparacion = new Preparacion();

        $objPreparacion->setPreparacionId($row["preparacion_id"]);
        $objPreparacion->setDescripcion($row["descripcion"]);
        $objPreparacion->setOrden($row["orden"]);
        $objPreparacion->setRecetaId($row["receta_id"]);
        return $objPreparacion;
    }
}
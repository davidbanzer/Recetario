<?php


namespace App\bll;


use App\dal\Connection;
use App\dto\Ingrediente;

class IngredienteBLL
{
    function insert($nombre, $receta_id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams(
            "INSERT INTO ingrediente (nombre, receta_id)
                VALUES (:varNombre, :varRecetaId)",
            array(
                ":varNombre" => $nombre,
                ":varRecetaId" => $receta_id
            )
        );
        return $objConecction->getLastInsertedId();
    }

    function update($nombre,$receta_id,$ingrediente_id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams("
        UPDATE ingrediente
        SET nombre = :varNombre,
            receta_id : varRecetaId
        WHERE ingrediente_id = :varId
        ", array(
            ":varNombre" => $nombre,
            ":varRecetaId"=>$receta_id,
            ":varId" => $ingrediente_id
        ));
    }

    function delete($ingrediente_id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams("
        DELETE FROM receta WHERE receta_id = :varId
        ", array(
            ":varId" => $ingrediente_id
        ));
    }

    function selectAll()
    {
        $listaIngrediente = array();
        $objConnection = new Connection();
        $res = $objConnection->query("
            SELECT *
            FROM ingrediente
        ");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $ingrediente = $this->rowToDto($row);
            $listaIngrediente[] = $ingrediente;
        }
        return $listaIngrediente;
    }

    function selectById($ingrediente_id)
    {
        $objConnection = new Connection();
        $res = $objConnection->queryWithParams("
            SELECT *
            FROM ingrediente
            WHERE ingrediente_id = :varId
        ", array(
            ":varId" => $ingrediente_id
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $objIngrediente = $this->rowToDto($row);
        return $objIngrediente;
    }

    private function rowToDto($row)
    {
        $objIngrediente = new Ingrediente();

        $objIngrediente->setIngredienteId($row["ingrediente_id"]);
        $objIngrediente->setNombre($row["nombre"]);
        $objIngrediente->setRecetaId($row["receta_id"]);
        return $objIngrediente;
    }
}

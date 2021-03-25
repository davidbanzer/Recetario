<?php


namespace App\dto;


class Ingrediente
{
    private $ingrediente_id;
    private $nombre;
    private $receta_id;

    /**
     * @return mixed
     */
    public function getIngredienteId()
    {
        return $this->ingrediente_id;
    }

    /**
     * @param mixed $ingrediente_id
     */
    public function setIngredienteId($ingrediente_id)
    {
        $this->ingrediente_id = $ingrediente_id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getRecetaId()
    {
        return $this->receta_id;
    }

    /**
     * @param mixed $receta_id
     */
    public function setRecetaId($receta_id)
    {
        $this->receta_id = $receta_id;
    }

}
<?php


namespace App\dto;


class Preparacion
{
    private $preparacion_id;
    private $descripcion;
    private $orden;
    private $receta_id;

    /**
     * @return mixed
     */
    public function getPreparacionId()
    {
        return $this->preparacion_id;
    }

    /**
     * @param mixed $preparacion_id
     */
    public function setPreparacionId($preparacion_id)
    {
        $this->preparacion_id = $preparacion_id;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * @param mixed $orden
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
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
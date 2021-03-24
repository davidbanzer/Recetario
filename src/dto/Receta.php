<?php
namespace App\dto;

class Receta{
    private $receta_id;
    private $nombre;
    private $descripcion;
    private $tiempo_preparacion;
    private $foto;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->receta_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($receta_id)
    {
        $this->receta_id = $receta_id;
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
    public function getTiempoPreparacion()
    {
        return $this->tiempo_preparacion;
    }

    /**
     * @param mixed $tiempo_preparacion
     */
    public function setTiempoPreparacion($tiempo_preparacion)
    {
        $this->tiempo_preparacion = $tiempo_preparacion;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }


}
?>
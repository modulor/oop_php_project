<?php 

namespace Models;

class Seccion
{
    private $id;
    private $nombre;
    private $con;

    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function set($atributo, $contenido)
    {
        $this->$atributo = $contenido;
    }

    public function get($atributo)
    {
        return $this->$atributo; 
    }

    public function add()
    {
        $sql = "insert into secciones (id, nombre) values (null, '{$this->nombre}'";
        $this->con->consultaSimple($sql);
    }

    public function listar()
    {
        $sql = "select * from secciones";
        $datos = $this->con->consultaRetorno($sql);
        return $datos;
    }

    public function delete()
    {
        $sql = "delete from secciones where id = '{$this->id}'";
        $this->con->consultaRetorno($sql);
    }

    public function edit()
    {
        $sql = "update from secciones set 
            nombre = '{$this->nombre}'
            where id = '{$this->id}'
        ";

        $this->con->consultaSimple($sql);
    }

    public function view()
    {
        $sql = "select * from secciones where id = '{$this->id}'";
        $datos = $this->con->consultaRetorno($sql);
        $row = mysqli_fetch_assoc($datos);
        return $row;
    }

}
